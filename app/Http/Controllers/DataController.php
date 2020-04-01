<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Token;
use App\DataEntry;
use App\Client;
use App\Agent;
use App\User;
use App\Datacall;
use App\Jobs\NewDeliveryJob;
use App\Jobs\ApprovalEmailJob;
use App\Jobs\NewInvoiceJob;
use NumberToWords\NumberToWords;
use App\Invoice;
use App\StatusTracking;
class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        
           return view('data.index');
            }


      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trackerview()
    {
        $data = DataEntry::OrderBy('id', 'desc')->get();
        return view('data.index',compact('data'));
    }

    public function payments()
    {
        $data = Invoice::OrderBy('id', 'desc')->get();
        return view('data.payment',compact('data'));
    }


      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tracking($id)
    {
        $data = DataEntry::all()->where('ref_token', $id)->first();
       
        return view('data.tracking',compact('data'));
    }

             /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexdata()
    {
        $data = DataEntry::OrderBy('id', 'desc')->get();
        return view('data.viewdata',compact('data'));
     }


          /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editdata($id)
    {
        $data = DataEntry::all()->where('ref_token',$id)->first();
        return view('data.edit',compact('data'));
     }

           /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewdata($id)
    {
        $data = DataEntry::all()->where('ref_token',$id)->first();
        $agent = Agent::OrderBy('id', 'desc')->get();
        return view('data.viewapproval',compact('data','agent'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $token = Token::Unique('data_entries','ref_token',5);
      $t = date("Y",strtotime("now"));
      $token = strtoupper('ESS-'.$token.'-'.$t);
      $client = Client::all();
      $agent = Agent::all();
      return view('data.create',compact('token','client','agent'));
    }


    public function store(Request $request)
        {
           

           if (is_null($request->input('client_ref'))) 
                  {
                    $token = Token::Unique('data_entries','ref_token',5);
                    $t = date("Y-M",strtotime("now"));
                    $token = strtoupper('ESCLIENT-'.$token.'-'.$t);           
                  }
           else
                   {
                        $token = $request->input('client_ref');  
                   }


                    $this->validate($request, [
                                      // 'ref_token' => 'required|unique:data_entries',
                                      'amount' => 'required:numeric|lt:1000000000',
                                      'ccy' => 'required',
                                      'ben_name' => 'required',
                                      'ben_id' => 'required',
                                      'loc_delivery' => 'required',
                                      'ben_id' => 'required'
                                  ]
                                );

                    $data = new DataEntry();
            		$data->ref_token =  $request->input('ref_token');
            		$data->client_name = $request->input('client_name');
            		$data->inst_date = $request->input('inst_date');
            		$data->desc = $request->input('desc');
            		$data->ben_name = $request->input('ben_name');
            		$data->ben_id = $request->input('ben_id');
            		$data->ben_phone = $request->input('ben_phone');
            		$data->loc_delivery = $request->input('loc_delivery');
            		$data->ccy = $request->input('ccy');
                    $data->amount = $request->input('amount');
            		$data->client_ref = $token;
            		$data->delivery_date = $request->input('delivery_date');
            		$data->rate = $request->input('rate');
                    $data->reviewer = $request->input('reviewer');
            		$data->checker = $request->input('checker');
            		$data->status = 'New';
                     
                     $docs = $request->file('client_inst');
                     $files=[];

                          if($request->hasfile('client_inst'))
                          {  
                            foreach ($docs as $media) {
                             
                                if (!empty($media)) {
                                    $destinationPath = storage_path('files');
                                    $filename = time().'.'.$media->getClientOriginalExtension();
                                    $media->move($destinationPath, $filename);
                                    $files[] = $filename;
                                  }
                                 }
                             }

                 $docs1 = $request->file('payment_list');
                 $files1=[];

                          if($request->hasfile('payment_list'))
                          {  
                            foreach ($docs1 as $media1) {
                             
                                if (!empty($media1)) {
                                    $destinationPath1 = storage_path('files');
                                    $filename1 = time().'.'.$media->getClientOriginalExtension();
                                    $media1->move($destinationPath1, $filename1);
                                    $files1[] = $filename1;
                                  }
                                 }
                             }

                        if(!empty($files1))
                         {

                            $data->payment_list = implode(';',$files1);

                         }

                         if(!empty($files))
                          {

                            $data->client_inst = implode(';',$files);

                          }

                        $data->agent = $request->input('agent');                
                		$data->save();

                    $track = new StatusTracking();
                    $track->ref_token = $request->input('ref_token');
                    $track->stage = 'DataEntry';
                    $track->inputer = Auth::user()->username;
                    $track->inputer_time = \Carbon\Carbon::now();
                    $track->inputer_status = 'Capture';
                    $track->save();

                     $emailJob = (new ApprovalEmailJob($data))->delay(\Carbon\Carbon::now()->addSeconds(2));        
                     $this->dispatch($emailJob);  

             return redirect('data-capture-view')->with('status','Succesfully Captured');
        }

    public function storeapproval(Request $request)

         {
            $token = $request->input('ref_token');
            $filename ='GEN-'.$token.'-'.date('Y').'.pdf'; 
            $t = DataEntry::all()->where('ref_token',$request->input('ref_token'))->first();
            $data =  DataEntry::findorfail($t->id);
            $data->status = $request->input('status');        
            $data->comments = $request->input('comments');
            $data->checker = Auth::user()->name;
            $data->delivery_status = 'Pending';
            $data->agent_pdf = $filename;
            $data->save();
            $data = Datacall::all()->where('ref_token',$token)->first();
            $numberToWords = new NumberToWords();
            $currencyTransformer = $numberToWords->getCurrencyTransformer('en');
            $words= $currencyTransformer->toWords($data->amount, 'USD'); 
            $pdf = \PDF::loadView('data.pdfs', compact('data','words'));
            $pdf->save(storage_path('authorizations/').$filename);        
            return redirect('agent-approval/'.$token)->with('status','Succesfully Captured');
         
           }

    public function viewapproval($token)
           
        { 
             $data = DataEntry::all()->where('ref_token',$token)->first();
             return view('data.previewagent',compact('data'));
        }

    public function sendapproval(Request $request)
        
         {
           
                $t = DataEntry::all()->where('ref_token',$request->input('ref_token'))->first();
                $tracker = StatusTracking::all()->where('stage','DataEntry')->where('ref_token',$t->ref_token)->first();

                     if ($request->input('status') == 'Reject')
                      {
                        $data =  DataEntry::findorfail($t->id);
                        $data->status = $request->input('status');        
                        $data->comments = $request->input('comments');
                        $data->checker = Auth::user()->name;
                        $data->delivery_status = 'Pending';
                        $data->save();

                        $tracker = StatusTracking::findorfail($tracker->id);
                        $tracker->authorizer = Auth::user()->username;
                        $tracker->authorizer_time = \Carbon\Carbon::now();
                        $tracker->authorizer_status = 'Correction';
                        $tracker->save();

                         return redirect('data-capture-view')->with('status','Succesfully Captured');
                      }

                $data =  DataEntry::findorfail($t->id);
                $data->status = $request->input('status');        
                $data->comments = $request->input('comments');
                $data->checker = Auth::user()->name;
                $data->delivery_status = 'Agent';
                $data->save();

                $tracker = StatusTracking::findorfail($tracker->id);
                $tracker->authorizer = Auth::user()->username;
                $tracker->authorizer_time = \Carbon\Carbon::now();
                $tracker->authorizer_status = 'Approved';
                $tracker->save();

                $data = Datacall::all()->where('ref_token',$t->ref_token)->first();

                $emailJob = (new NewDeliveryJob($data))->delay(\Carbon\Carbon::now()->addSeconds(2));        
                $this->dispatch($emailJob);  
                return redirect('view-tracker')->with('status','Succesfully Captured');
         }


     public function paymentsend(Request $request)
     {
       
       $t = DataEntry::all()->where('ref_token',$request->input('ref_token'))->first();
        $data =  DataEntry::findorfail($t->id);
        $data->status = $request->input('status');        
        $data->comments = $request->input('comments');
        $data->checker = Auth::user()->name;
        $data->delivery_status = 'pending';
        $data->save();
          $data = Datacall::all()->where('ref_token',$t->ref_token)->first();

        $emailJob = (new NewDeliveryJob($data))->delay(\Carbon\Carbon::now()->addSeconds(2));        
            $this->dispatch($emailJob);  

        return redirect('view-tracker')->with('status','Succesfully Captured');
        }
/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('data.view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewinvoice($id)
    {
        $data =  DataEntry::all()->where('ref_token',$id)->first();
        return view('data.preview',compact('data'));
    }

       public function storeinvoice(Request $request)
     {
        $tokens = $request->input('ref_token');

        $filename ='INVOICE-'.$tokens.'-'.date('Y').'.pdf'; 
         $token = Token::Unique('data_entries','ref_token',5);
         $t = date("Y-M",strtotime("now"));
         $token = strtoupper('INVOICE-'.$token.'-'.$t);
        \File::delete(storage_path('authorizations/'.$filename.''));
   
     
        $t = DataEntry::all()->where('ref_token',$request->input('ref_token'))->first();
        $data =  DataEntry::findorfail($t->id);
        $data->status = $request->input('status');
        $data->comments = $request->input('comments');
        $data->delivery_status = 'Done';
        $data->invoice_pdf =$filename;
         $media = $request->file('proof_delivery');
             $files=[];
          if($request->hasfile('proof_delivery'))
          {  
           
             
                if (!empty($media)) {
                    $destinationPath = storage_path('files');
                    $fname = time().'.'.$media->getClientOriginalExtension();
                    // $filename = $media->getClientOriginalName();
                    $media->move($destinationPath, $fname);
                    $files[] = $fname;
                  }
                
             }
         if(!empty($files))
                {
                    $data->proof_delivery = implode(';',$files);
                }
        $data->save();
        $deta = Datacall::all()->where('ref_token',$request->input('ref_token'))->first();
        $coms = (($deta->amount)*0.03);
        $data = Invoice::all()->where('ref_token',$token)->first();

        if (!is_null($data)) {
        $inv =  Invoice::findorfail($data->id);
        $inv->ref_token = $deta->ref_token;
        $inv->invoice_no = $token;
        $inv->client_ref = $deta->client_name;
        $inv->client_name = $deta->cname;
        $inv->ben_name = $deta->ben_name;
        $inv->rate = '3%';
        $inv->amount = $deta->amount;
        $inv->commission =$coms;
        $inv->disbursed = ($coms + $deta->amount);
        $inv->paid = 0;
        $inv->balance = 0;
        $inv->invoice = $filename;
        $inv->status = 'unpaid';
        $inv->save();
        }
        else
        {
        $inv = new Invoice();
        $inv->ref_token =  $deta->ref_token;
        $inv->invoice_no = $token;
        $inv->client_ref = $deta->client_name;
        $inv->client_name = $deta->cname;
        $inv->ben_name = $deta->ben_name;
        $inv->rate = '3%';
        $inv->amount = $deta->amount;
        $inv->commission =$coms;
        $inv->disbursed = ($coms + $deta->amount);
        $inv->paid = 0;
        $inv->balance = 0;
        $inv->invoice = $filename;
        $inv->status = 'unpaid';
        $inv->save(); 
        }
        // $emailJob = (new NewDeliveryJob($data))->delay(\Carbon\Carbon::now()->addSeconds(2));        
        //     $this->dispatch($emailJob);  

        $data = Invoice::all()->where('ref_token',$deta->ref_token)->first();
        $numberToWords = new NumberToWords();
        // return $data;
        $currencyTransformer = $numberToWords->getCurrencyTransformer('en');
        $words= $currencyTransformer->toWords(($coms + $deta->amount), 'USD'); 
      //  return $words;
        $pdf = \PDF::loadView('data.invoice2', compact('data','words'));
        $pdf->save(storage_path('authorizations/').$filename);
        
        return redirect('invoice-preview/'.$deta->ref_token)->with('status','Succesfully Captured');
        $emailJob = (new NewInvoiceJob($data))->delay(\Carbon\Carbon::now()->addSeconds(2));        
            $this->dispatch($emailJob);  

        return redirect('agent-approval/'.$token)->with('status','Succesfully Captured');
        }

        public function invoicesend(Request $request)
     {
        $tokens = $request->input('ref_token');
     
        $t = DataEntry::all()->where('ref_token',$request->input('ref_token'))->first();  
        $data =  DataEntry::findorfail($t->id);
        $data->status = $request->input('status');
        $data->comments = $request->input('comments');
        $data->save();     
        $data = DataEntry::all()->where('ref_token',$tokens)->first();   
        $emailJob = (new NewInvoiceJob($data))->delay(\Carbon\Carbon::now()->addSeconds(2));        
            $this->dispatch($emailJob);  

        return redirect('payments')->with('status','Succesfully Captured');
        }

         public function invoicepaid(Request $request)
     {
        $tokens = $request->input('ref_token');

     
        $t = DataEntry::all()->where('ref_token',$request->input('ref_token'))->first();  
        $invoice = Invoice::all()->where('ref_token',$request->input('ref_token'))->first();  
        $data =  DataEntry::findorfail($t->id);
        $data->status = $request->input('status');
        $data->comments = $request->input('desc');
        $data->save();  
          $datas =  Invoice::findorfail($invoice->id);
        $datas->status = $request->input('status');
         $datas->pay_date = \Carbon\Carbon::now();
         $datas->pay_inputter = Auth::user()->email;
           $datas->status = 'Paids';
          $datas->save();  


        return back()->with('status','Succesfully Captured');
        $datas =  Invoice::findorfail($invoice->id);
        $datas->status = $request->input('status');
         $datas->pay_date = \Carbon\Carbon::now();
         $datas->pay_inputter = Auth::user()->email;
           $datas->status = 'Paid';
          $datas->save();  

      

        return redirect('view-agent')->with('status','Succesfully Captured');
        }

            public function invoicepaidz(Request $request)
     {
        $tokens = $request->input('ref_token');
         $t = DataEntry::all()->where('ref_token',$request->input('ref_token'))->first();  
        $invoice = Invoice::all()->where('ref_token',$request->input('ref_token'))->first();  
        $data =  DataEntry::findorfail($t->id);
        $data->status = $request->input('status');
        $data->comments = $request->input('desc');
        $data->save();  

        $datas =  Invoice::findorfail($invoice->id);
        $datas->status = $request->input('status');
         $datas->pay_date = \Carbon\Carbon::now();
         $datas->pay_inputter = Auth::user()->email;
        $datas->status = 'Paid';
          $datas->save();  

      

        return redirect('view-agent')->with('status','Succesfully Captured');
        }

        public function invoicepaids($id)
            {
        $data = DataEntry::all()->where('ref_token',$id)->first();
        return view('data.receive_payment',compact('data'));
            }

             public function viewagent()
            {
        $data = DataEntry::all()->where('status','Paids');
        return view('data.view-agent',compact('data'));
            }



      public function pdf($id)
    {
        
        
     $filename = $id;
     $path = storage_path('files/'.$filename);

     $data = file_get_contents($path);
     if (empty($data)) {
      return back()->with('danger','No data ');
     }
     // return response()->file($path);
     return \Response::make(file_get_contents($path), 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="'.$filename.'"'
    ]);
return FacadeResponse::make(file_get_contents($path), 200, [
    'Content-Type' => 'application/pdf',
    'Content-Disposition' => 'inline; filename="'.$filename.'"'
])->download($filename, $filename);
// return response()->download($file, 'new_name.docx');
    }

     public function letterpdf($id)
    {
        
        
     $filename = $id;
     $path = storage_path('authorizations/'.$filename);

     $data = file_get_contents($path);
     if (is_null($path)) {
      return back()->with('danger','No data ');
     }
     // return response()->file($path);
     return \Response::make(file_get_contents($path), 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="'.$filename.'"'
    ]);
// return FacadeResponse::make(file_get_contents($path), 200, [
//     'Content-Type' => 'application/pdf',
//     'Content-Disposition' => 'inline; filename="'.$filename.'"'
// ])->download($filename, $filename);
// return response()->download($file, 'new_name.docx');
    }


       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function payaction($token)
    {
        $data = Invoice::all()->where('ref_token',$token)->first();
        return \Response::json($data);
        return view('data.index',compact('data'));
    }

     public function datadetails($token)
    {
        $data = DataEntry::all()->where('ref_token',$token)->first();
        return \Response::json($data);
        return view('data.index',compact('data'));
    }

}



//commission Calculation
// commission_on_client - commission_on_agent = Banks_commission (Dollar Transaction)
// dollar_equivalent - dollar_paid_to_agent = Banks_commission (SSP Transaction)



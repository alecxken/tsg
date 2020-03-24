<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Token;
use App\DataEntry;
use App\Client;
use App\Agent;
use App\User;
use App\Jobs\NewDeliveryJob;
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
        return view('data.create',compact('token','client'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
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
		$data->client_ref = $request->input('client_name');
		$data->delivery_date = $request->input('delivery_date');
		$data->rate = $request->input('rate');
        $data->reviewer = $request->input('reviewer');
		$data->checker = $request->input('checker');
		$data->status = 'new';

             $docs = $request->file('client_inst');
             $files=[];
          if($request->hasfile('client_inst'))
          {  
            foreach ($docs as $media) {
             
                if (!empty($media)) {
                    $destinationPath = storage_path('files');
                    $filename = time().'.'.$media->getClientOriginalExtension();
                    // $filename = $media->getClientOriginalName();
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
                    // $filename = $media->getClientOriginalName();
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
                
        		$data->save();

        return redirect('data-capture-view')->with('status','Succesfully Captured');
    }

     public function storeapproval(Request $request)
     {
       
       $t = DataEntry::all()->where('ref_token',$request->input('ref_token'))->first();
        $data =  DataEntry::findorfail($t->id);
        $data->status = $request->input('status');
        $data->agent = $request->input('agent');
        $data->comments = $request->input('comments');
        $data->checker = Auth::user()->name;
        $data->delivery_status = 'pending';

        $data->save();


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
    public function destroy($id)
    {
        //
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
 use Token;
 use App\EssReport;
 use App\Jobs\NotificationJob;

class EssController extends Controller
{
    
	public function system()
   {
   	 $t = Token::UniqueNumber('ess_reports', 'token', 4 );
      $token = 'ESS-'.$t.'-'.date('Y').'';
    	 return view('ess.view',compact('token'));
   }
    public function reportstore(Request $request)
   {
   	 $this->validate($request, [
                         
                          'reasons' => 'required',
                     ]);
     
   	$data = new EssReport();
   	$data->token = $request->input('token');
   	$data->reasons = $request->input('reasons');
  	$data->status = 'new';
   	$data->save();
   	 $emailJob = (new NotificationJob())->delay(\Carbon\Carbon::now()->addSeconds(1));        
             $this->dispatch($emailJob);
   	 return back()->with('status','successfully submitted thank you');
   }

   public function concerns()
   {
     $data = EssReport::all()->where('status','new');
   	 return view('ess.new',compact('data'));
   }

    public function concernscomplete()
   {
     $data = EssReport::all()->where('status','read');
   	 return view('ess.read',compact('data'));
   }

   public function read($id)
   {

   	$reg = EssReport::all()->where('id',$id)->first();
   	$data = EssReport::findorfail($id);
   	$data->status ='read';
   	$data->save();
   	return back()->with('status','successfully Read Concern');
   }

   

}

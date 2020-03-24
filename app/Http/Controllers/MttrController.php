<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MttrSystem;
use App\Region;
use Auth;
use App\User;
use DB;
 use Charts;
 use Token;
 use App\Report;
 use App\Tracker;
class MttrController extends Controller
{
	//
	public function makeChart($type)

    {

        switch ($type) {

            case 'bar':

                $users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y')) ->get();

                $chart = Charts::database($users, 'bar', 'highcharts') 

                            ->title("Transactions Record") 

                            ->elementLabel("Total Users") 

                            ->dimensions(1000, 500) 

                            ->responsive(true) 

                            ->groupByMonth(date('Y'), true);

                break;



            case 'pie':

              // $post = DB::table('jobrefs')->pluck('Position');
              $post = Trans::all()->pluck('unit');
              $num = Trans::all()->pluck('trans');
              // return $num;
     
                $chart = Charts::create('bar', 'highcharts')

                            ->title('TRANSACTIONS DISTRIBUTION PER BRANCH')

                            ->labels($post)

                            ->values($num)

                             // ->colors(['#FF5733','#33FF42','#33B3FF','#C70039','#FF3351','#FFC300','#7B33FF','#FF33B7','#3D3D3D', '#985689'])

                            ->dimensions(1000,500)

                            ->responsive(true);

                break;



            case 'donut':

                $chart = Charts::create('donut', 'highcharts')

                            ->title('te')

                            ->labels(['First', 'Second', 'Third'])

                            ->values([5,10,20])

                            ->dimensions(1000,500)

                            ->responsive(true);

                break;



            case 'line':
                 $post = CddSearch::all()->pluck('transtype');
                 $num = CddSearch::all()->pluck('branch');
                 $chart = Charts::create('line', 'highcharts')

                            ->title('HDTuto.com Laravel Line Chart')

                            ->elementLabel('HDTuto.com Laravel Line Chart Lable')

                            ->labels($post)

                            ->values($num)

                            ->dimensions(1000,500)

                            ->responsive(true);

                break;



            case 'area':

                $chart = Charts::create('area', 'highcharts')

                            ->title('HDTuto.com Laravel Area Chart')

                            ->elementLabel('HDTuto.com Laravel Line Chart label')

                            ->labels(['First', 'Second', 'Third'])

                            ->values([5,10,20])

                            ->dimensions(1000,500)

                            ->responsive(true);

                break;



            case 'geo':

                $chart = Charts::create('geo', 'highcharts')

                            ->title('HDTuto.com Laravel GEO Chart')

                            ->elementLabel('HDTuto.com Laravel GEO Chart label')

                            ->labels(['KE', 'UG', 'RU'])

                            ->colors(['#3D3D3D', '#985689'])

                            ->values([5,10,20])

                            ->dimensions(1000,500)

                            ->responsive(true);

                break;



            default:

                # code...

                break;

        }

        return view('chart', compact('chart'));

    }
    //REPRTING

    public function report()
   {
   	$reg = Region::all()->where('status','active');
   	$data = MttrSystem::all();
   	 return view('report',compact('data','reg'));
   }

     public function reportview()
   {
  	$datasx = MttrSystem::all();
   	$datas = Tracker::all();
   	$data = Report::all();
   	 return view('mttr.index',compact('data','datas','datasx'));
   }

   public function reportstore(Request $request)
   {
   	  $t = Token::UniqueNumber('reports', 'token', 4 );
      $token = 'E'.Auth::user()->affiliate.'-'.$t.'-'.date('Y').'';

      foreach ($request->input('system') as $key => $value) {
        $date = Tracker::all()->where('date',\Carbon\Carbon::today()->addDays(0))->where('system',$key)->first();
                       // if (empty($date)) 
                       //            {
                                    $insert[] =
                                     [
                                      'token' => $token,
                                      'user'  => Auth::id(),
                                      'affiliate'  => Auth::user()->affiliate,
                                      'date'  => \Carbon\Carbon::today()->addDays(0),
                                      'system'  => $request->input('system')[$key],
                                      'status'  => $request->input('status')[$key],
                                      'sysaid'  => $request->input('ticket')[$key],
                                      'comments'  => $request->input('comment')[$key],
                                     ];

                                     $data[] =
                                     [                                 
                                      'region'=> Auth::user()->affiliate,
                                      'date'=>\Carbon\Carbon::today()->addDays(0),
                                      'system'=>$request->input('system')[$key],
                                      'status'=>$request->input('status')[$key],
                                     ];
                                 if(!empty($date))
                                 {
                                 $map = DB::table('trackers')->where('system', $date->system)->update($data);
                                 }
                                 else
                                 {
                                 $map = DB::table('trackers')->insert($data);
                                 }

                                  }

                       $tess =\DB::table('reports')->insert($insert);
                       return redirect('home')->with('status','done');
        
        
   }
	//MTTR SYSTEM SECTION
	public function system()
   {
   	$reg = Region::all()->where('status','active');
   	$data = MttrSystem::all();
   	 return view('mttr.system',compact('data','reg'));
   }
    public function systemstore(Request $request)
   {
   	 $this->validate($request, [
                          'name' => 'required|unique:mttr_systems',
                          'type' => 'required',
                          'affiliate' => 'required',
                     ]);
  
   	$data = new MttrSystem();
   	$data->name = $request->input('name');
   	$data->type = $request->input('type');
   	$data->affiliate = $request->input('affiliate');
   	$data->status = 'active';
   	$data->save();
   	 return back()->with('status','success');
   }




  public function auditrail()
   {
   	$data = DB::table('audits')->get();
   	return view('mttr.audittrail',compact('data'));
   }

	// Affiliates Registration Section
   public function region()
   {
   	$data = Region::all();
   	 return view('mttr.country',compact('data'));
   }
   public function getaffiliates()
   {
   	$data = Region::all()->where('status','active');
   	 return $data;
   }
   public function regionedit($id,$action)
   {
   	$data = Region::findorfail($id);
   	if ($action == 'delete') {
   	$data->status = 'inactive';
   	}
   	else{
   	$data->status = 'active';	
   	}
   	$data->save();
   	return back()->with('status','success');
   }

    public function regionstore(Request $request)
   {
   	 $this->validate($request, [
                          'country' => 'required|unique:regions',
                          'code' => 'required',
                          'affiliate' => 'required',
                     ]);
   	$data = new Region();
   	$data->country = $request->input('country');
   	$data->code = $request->input('code');
   	$data->affiliate = $request->input('affiliate');
   	$data->status = 'active';
   	$data->save();
   	 return back()->with('status','success');
   }

   public function regionupdate(Request $request)
   {
   	 $this->validate($request, [
                          'country' => 'required|unique:regions',
                          'code' => 'required',
                          'affiliate' => 'required',
                     ]);
   	$data = Region::findorfail($request->input('id'));
   	$data->country = $request->input('country');
   	$data->code = $request->input('code');
   	$data->affiliate = $request->input('affiliate');
   	$data->status = 'active';
   	$data->save();
   	 return back()->with('status','success');
   }

}

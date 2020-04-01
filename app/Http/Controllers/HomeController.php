<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use Token;
    use App\User;
    use App\Trans;
    use Charts;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
 $post = Trans::all()->pluck('state');
              $num = Trans::all()->pluck('items');


               //return $post;
     
                $chart = Charts::create('pie', 'highcharts')

                            ->title('TRANSACTIONS DISTRIBUTION PER STAGE')

                            ->labels($post)

                            ->values($num)

                             // ->colors(['#FF5733','#33FF42','#33B3FF','#C70039','#FF3351','#FFC300','#7B33FF','#FF33B7','#3D3D3D', '#985689'])

                            ->dimensions(1000,500)

                            ->responsive(true);

                 $sam = Charts::create('bar', 'highcharts')

                            ->title('TRANSACTIONS DISTRIBUTION PER STAGE')

                            ->labels($post)

                            ->values($num)

                             ->colors(['#FF5733','#33FF42','#33B3FF','#C70039','#FF3351','#FFC300','#7B33FF','#FF33B7','#3D3D3D', '#985689'])

                            ->dimensions(1000,500)

                            ->responsive(true);
 return view('home',compact('chart','sam'));
}
    public function indexs($type)
    {

        switch ($type) {

            case 'bar':

                $users = CddSearch::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y')) ->get();

                $chart = Charts::database($users, 'bar', 'highcharts') 

                            ->title("Transactions Record") 

                            ->elementLabel("Total Users") 

                            ->dimensions(1000, 500) 

                            ->responsive(true) 

                            ->groupByMonth(date('Y'), true);

                break;



            case 'pie':

              // $post = DB::table('jobrefs')->pluck('Position');
              $post = Trans::all()->pluck('state');
              $num = Trans::all()->pluck('items');


               //return $post;
     
                $chart = Charts::create('pie', 'highcharts')

                            ->title('TRANSACTIONS DISTRIBUTION PER STAGE')

                            ->labels($post)

                            ->values($num)

                             // ->colors(['#FF5733','#33FF42','#33B3FF','#C70039','#FF3351','#FFC300','#7B33FF','#FF33B7','#3D3D3D', '#985689'])

                            ->dimensions(1000,500)

                            ->responsive(true);

                 $sam = Charts::create('bar', 'highcharts')

                            ->title('TRANSACTIONS DISTRIBUTION PER STAGE')

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


        return view('home',compact('chart','sam'));
    }

public function system()
   {
     $t = Token::UniqueNumber('ess_reports', 'token', 4 );
      $token = 'ESS-'.$t.'-'.date('Y').'';
         return view('ess.view',compact('token'));
   }

      public function profile()
    {      
      return view('admin.profile');
    }
   public function profileupdate(Request $request)
    {

      $this->validate($request, [
              'name'=>'required|max:120',                      
              
          ]);

          $id = $request->input('id');
          $user = User::findOrFail($id); //Get role specified by id
          $user->email = $request->input('email');
          $user->name = $request->input('name');
          $user->username = $request->input('username');
          $media = $request->file('file');

          if($request->hasfile('file'))
          {            
             
                if (!empty($media)) {
                    $destinationPath = storage_path('signatures');
                    $fname = date('Y').'-'.$request->input('username').'.'.$media->getClientOriginalExtension();
                    $media->move($destinationPath, $fname);                
               
                  }
                
             }
         if(!is_null($fname))
                {
                    $user->signature = $fname;
                }

              
          $user->save();
          return redirect('profile')->with('status','successfully Updated');
    }

}

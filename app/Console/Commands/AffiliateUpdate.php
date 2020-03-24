<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\MttrSystem;
use App\Region;
use Auth;
use App\User;
use DB;
 use Charts;
 use Token;
 use App\Report;
 use App\Tracker;
  use App\Trans;
  use App\systemcount;
  use Response;

class AffiliateUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
         $t = Token::UniqueNumber('reports', 'token', 4 );
       $token = 'E'.Auth::user()->affiliate.'-'.$t.'-'.date('Y').'';
       $affiliate = Auth::user()->affiliate;
        $system = MttrSystem::all()->where('status','active');
        $dates = Tracker::all()->where('region',$affiliate)->last();
         if (empty($dates)) {
             $dates = \Carbon\Carbon::today();
         }
         else
         {
            $dates = $dates->created_at;
         }
          $period = \Carbon\CarbonPeriod::create($dates, \Carbon\Carbon::today());
          $dd = $period->toArray();
         foreach ($dd as $keys => $deta)
           {
            foreach ($system as  $values) 
             {
            $sys =$values->id;
            $report = Report::all()->where('created_at',$deta)->where('affiliate',$affiliate)->where('system',$sys)->where('user',Auth::id())->where('status','0')->first();
            $date = Tracker::all()->where('created_at',$deta)->where('system',$sys)->where('region',Auth::user()->affiliate)->where('status','0')->first();
                
                 
                if (empty($report)) {

                   // $insert[] = [
                   //  'token' => $token,
                   //  'user' =>  Auth::id(),
                   //  'affiliate' =>  $affiliate,
                   //   'date' => $deta,
                   //  'created_at' => $deta,
                   //  'system' => $sys,
                   //   'status' => 0,
                   //  'sysaid' => 'N/A',
                   //  'comments' => 'Status Ok',

                   //              ];
                    
                    }
                        if(empty($date))
                                
                                 {
                                  $d[] =[
                                   
                                    'region' =>  $affiliate,
                                    'date' =>$deta,
                                     'created_at' => $deta,
                                    'system' => $sys,
                                    'status' =>0,
                                         ];
                                                           
                                 }
                  }
                 
                
              }
             //  if (!empty($insert)) {
             // DB::table('reports')->insert($insert);
             //  }
              if (!empty($d)) {
             DB::table('trackers')->insert($d);
              }
             return redirect('home')->with('status','Welcome update done'); 
    }
}

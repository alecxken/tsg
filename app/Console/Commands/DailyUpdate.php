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

class DailyUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mttr Reporting Sheduler';

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
     $track = Tracker::all()->where('created_at',\Carbon\Carbon::today()->addDays(0));
    
     
     
     $affiliate = Region::all();
     $system = MttrSystem::all()->where('status','active');
    
       
         foreach ($affiliate as  $value) 

     {


         $affiliate = $value->code;
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
         foreach ($dd as $keys => $deta) {
         $tokens = Token::UniqueNumber('reports', 'token', 4 );
         $token = 'E'.$affiliate.'-'.$tokens.'-'.date('Y').'';
          foreach ($system as  $values) 

          {
            $sys =$values->id;
          
            $date = Tracker::all()->where('created_at',$deta)->where('region',$affiliate)->where('system',$sys)->first();
    $report = Report::all()->where('created_at',$deta)->where('affiliate',$affiliate)->where('system',$sys)->first();

                if (!empty($report)) {

                    $state = Report::findorfail($report->id);
                     if ($state->status == 0) 
                        {
                         $state->status = 0;
                         $state->save();
                         }   
                }
                else
                {
                        $state = new Report();
                        $state->token = $token;
                        $state->user = 0;
                        $state->affiliate =  $affiliate;
                        $state->date = $deta;
                        $state->created_at = $deta;
                        $state->system = $sys;
                        $state->status = 0;
                        $state->sysaid = 'N/A';
                        $state->comments = 'Status Ok';
                        $state->save();

                   
                }
                         
                            if(!is_null($date))
                                 {
                                  $d = Tracker::findorfail($date->id);
                                  if ($date->status == 0) {
                                   $d->status = 0;
                                   $d->save();
                                   }                                 
                                  
                                 }
                                 else
                                 {
                                  $d = new Tracker();
                                  $d->region =$affiliate;
                                  $d->date =$deta;
                                  $d->created_at =$deta;
                                  $d->system =$sys;
                                  $d->status =0;
                                  $d->save();
                                
                                 }
                            

          }
     }
    }
     return redirect('home')->with('status','welcome ');
 }
     
 // $insert[] = [
                    //                   'token' => $token,
                    //                   'user'  => 0,
                    //                   'affiliate'  => $affiliate,
                    //                   'date'  => \Carbon\Carbon::today()->addDays(0),
                    //                   'created_at'  => \Carbon\Carbon::today()->addDays(0),
                    //                   'system'  => $sys,
                    //                   'status'  => 0,
                    //                   'sysaid'  => 'N/A',
                    //                   'comments'  => 'Status Ok',
                    //             ];
                   //@@@|| $tess =\DB::table('reports')->insert($insert);

}

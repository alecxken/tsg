<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use App\Mail\ApprovalRequestMail;
use App\DataEntry;
use App\Client;
use App\Agent;
use App\User;
 
class ApprovalEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
      public $data;
    public function __construct(DataEntry $data)
    {
  $this->data =$data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
         $q = \Spatie\Permission\Models\Role::all();
     $test = User::whereHas("roles", function($q){ $q->where("name", "Authorizer"); })->get();
     foreach ($test as  $value) {
         $email[] = $value->email;
     }
       $reviewer =User::where('name',$this->data->reviewer)->first();  
     $agent =DataEntry::where('ref_token',$this->data->ref_token)->first();  
    Mail::to($email)->cc($reviewer->email)->send( new ApprovalRequestMail($agent)); 
    }
}

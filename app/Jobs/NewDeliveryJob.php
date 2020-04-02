<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use App\Mail\NewDeliveryAlert;
use App\DataEntry;
use App\Datacall;
use App\Client;
use App\Agent;
use App\User;
 

class NewDeliveryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $data;
    public function __construct(Datacall $data)
    {
  $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
    $checker =User::where('username',$this->data->checker)->first();
    $reviewer =User::where('username',$this->data->reviewer)->first();  
    $agent =Agent::where('token',$this->data->agent)->first();  
    $cc =['akendagor@ecobank.com',$checker->email,$reviewer->email,]; 
    
    
   //
    $agentname = $agent->name;
    $mail = $agent->email;
    $deta = DataEntry::all()->where('ref_token',$this->data->ref_token)->first();
   
    $agent_pdf = $deta->agent_pdf;
    $ref_token = $deta->ref_token;

     $this->agent_pdf = $agent_pdf;
      $this->ref_token = $ref_token;
    $this->agentname = $agentname;
         $path = storage_path('authorizations/'.$this->agent_pdf.'');
    
    Mail::to($mail)->cc($cc)->send( new NewDeliveryAlert($agentname,$agent_pdf,$ref_token,$path)); 
    }
}

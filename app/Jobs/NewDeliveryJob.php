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
    $checker =User::where('name',$this->data->checker)->first();
    $reviewer =User::where('name',$this->data->reviewer)->first();  
    $agent =Agent::where('token',$this->data->agent)->first();  
    $cc =['akendagor@ecobank.com',$checker->email,$reviewer->email,]; 
    
    
   //
    $agentname = $agent->name;
    $mail = $agent->email;
   

    $this->agentname = $agentname;
    
    Mail::to($mail)->cc($cc)->send( new NewDeliveryAlert($agentname)); 
    }
}

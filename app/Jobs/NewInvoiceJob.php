<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use App\Mail\NewInvoiceMail;
use App\DataEntry;
use App\Datacall;
use App\Client;
use App\Agent;
use App\User;
use App\Invoice;
 
class NewInvoiceJob implements ShouldQueue
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
  $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
     public function handle()
    {

    $deta = DataEntry::all()->where('ref_token',$this->data->ref_token)->first();

    $checker =User::where('username',$deta->checker)->first();
    $reviewer =User::where('username',$deta->reviewer)->first();  
    $agent =Client::where('token',$deta->client_name)->first();  
    $cc =['akendagor@ecobank.com',$checker->email,$reviewer->email,]; 
    $data = Invoice::all()->where('ref_token',$this->data->ref_token)->first();
    
  // dd($agent);
    $agentname = $agent->name;
    $mail = $agent->email;
   
    $invoice_pdf = $deta->invoice_pdf;
    $ref_token = $deta->ref_token;
    $loc_delivery = $deta->loc_delivery;
    $ccy = $deta->ccy;
    $amount = $deta->amount;

    $this->invoice_pdf = $invoice_pdf;
    $this->ref_token = $ref_token;
    $this->agentname = $agentname;
    $this->loc_delivery = $loc_delivery;
    $this->ccy = $ccy;
    $this->amount = $amount;
     $path = storage_path('authorizations/'.$this->invoice_pdf.'');
     
       // dd($invoice_pdf);


    Mail::to($mail)->cc($cc)->send( new NewInvoiceMail($invoice_pdf,$ref_token,$agentname,$loc_delivery,$ccy,$amount,$path)); 
    }
}

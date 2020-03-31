<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use DataEntry;
class NewDeliveryAlert extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
      public $agentname;
      public $agent_pdf;
    public $ref_token;
     public $path;
    public function __construct($agentname, $agent_pdf,$ref_token,$path)
    {
  $this->agentname =$agentname;
  $this->agent_pdf =$agent_pdf;
   $this->ref_token =$ref_token;
   $this->path =$path;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         // $path ='C:\inetpub\wwwroot\ecofinal\public\file\Calypso.xlsx';
         $path = storage_path('authorizations/'.$this->agent_pdf.'');
        return $this->subject('Delivery-Request Alert '.$this->ref_token.' ')->markdown('emails.alertdelivery')->attach($this->path);
     //   return $this->subject('Delivery-Request Alert ')->markdown('emails.alertdelivery');
    }
}

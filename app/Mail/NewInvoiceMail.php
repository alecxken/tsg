<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Invoice;
class NewInvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $ref_token;    
    public $invoice_pdf;
    public $agentname;

    public  $loc_delivery;
    public  $ccy;
    public  $amount; 
    public  $path; 
    
    public function __construct($ref_token,$invoice_pdf,$agentname,$loc_delivery,$ccy,$amount,$path)
    {
    
      
      $this->invoice_pdf = $invoice_pdf;
      $this->ref_token = $ref_token;
      $this->agentname = $agentname;
      $this->loc_delivery =$loc_delivery;
      $this->ccy =$ccy;
      $this->amount =$amount;
      $this->path = $path;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         // $path ='C:\inetpub\wwwroot\ecofinal\public\file\Calypso.xlsx';
         // $paths = storage_path('authorizations/'.$this->invoice_pdf.'');
         
         // $path =realpath("storage/almacenamiento/".$carpeta."/".$archivo);  
         //  $path = $paths;
        return $this->subject('Delivery Invoice '.$this->ref_token.' ')->markdown('emails.alertinvoice')->attach($this->path);
     //   return $this->subject('Delivery-Request Alert ')->markdown('emails.alertdelivery');
    }
}

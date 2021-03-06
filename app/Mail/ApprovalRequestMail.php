<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApprovalRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $agent;
  
    public function __construct( $agent)
    {
  $this->agent =$agent;

    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->subject('Approval/Review Needed')->markdown('emails.alertapproval');
    }
}

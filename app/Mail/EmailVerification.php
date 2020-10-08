<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $title;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $title, $subject)
    {
        $this->data = $data;
        $this->title = $title;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $view  = 'emails.verify';
      
        return $this->view($view)
                        ->with(['data' => $this->data , 'title' => $this->title])
                        ->from('Jtc-Trainingplat@moj.gov.sa' , $this->title)
                        ->subject($this->subject);
    }
}


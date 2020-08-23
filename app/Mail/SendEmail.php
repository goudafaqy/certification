<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $title;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $title, $subject, $type)
    {
        $this->data = $data;
        $this->title = $title;
        $this->subject = $subject;
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.general')
                        ->with(['data' => $this->data , 'title' => $this->title ,'type'=> $this->type])
                        ->from('adlytmscenter@gmail.com' , __($this->title))
                        ->subject(__($this->subject));
    }
}


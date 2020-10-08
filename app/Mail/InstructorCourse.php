<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InstructorCourse extends Mailable
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
        return $this->view('emails.instructor_account')
                        ->with(['data' => $this->data , 'title' => $this->title])
                        ->from('adlytmscenter@gmail.com' , __($this->title))
                        ->subject(__($this->subject));
    }
}


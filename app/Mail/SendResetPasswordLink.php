<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendResetPasswordLink extends Mailable
{
    use Queueable, SerializesModels;

    protected $user ;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($link)
    {
        $this->link = $link ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reset')
                        ->with(['link' => $this->link])
                        ->from('Jtc-Trainingplat@mail.moj.gov.sa' , ' العادلى للدورات التدريبة  ')
                        ->subject('استرداد كلمة السر الخاصة بك');
    }
}

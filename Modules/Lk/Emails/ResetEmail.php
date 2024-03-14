<?php

namespace Modules\Lk\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected mixed $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(mixed $token, $locale = 'ru')
    {

        $this->token = $token;
        $this->locale = $locale;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        \App::setLocale($this->locale);
        return $this->view('lk::mail.reset-password',[
            "token" => $this->token
        ]);
    }
}

<?php

namespace App\Mail;

use Illuminate\Mail\Mailable as BaseMailable;

abstract class Mailable extends BaseMailable
{
    public function send($mailer)
    {
        $this->withSymfonyMessage(function ($message) {
            $message->mailable = get_class($this);
        });

        parent::send($mailer);
    }
}

<?php

namespace App\Listeners;

use Illuminate\Mail\Events\MessageSent;

class LogSentEmailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(MessageSent $event)
    {
        $event->data['message'] = $event->message->getTextBody();

        foreach ($event->message->getTo() as $mail) {
            activity()
                ->withProperties($event->data)
                ->causedByAnonymous()
                ->event('mail')
                ->log("Email sent ... Re: {$event->message->getSubject()} (To: {$mail->getAddress()})");
        }

        foreach ($event->message->getCc() as $mail) {
            activity()
                ->withProperties($event->data)
                ->causedByAnonymous()
                ->event('mail')
                ->log("Email sent ... Re: {$event->message->getSubject()} (Cc: {$mail->getAddress()})");
        }

        foreach ($event->message->getBcc() as $mail) {
            activity()
                ->withProperties($event->data)
                ->causedByAnonymous()
                ->event('mail')
                ->log("Email sent ... Re: {$event->message->getSubject()} (Bcc: {$mail->getAddress()})");
        }
    }
}

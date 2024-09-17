<?php

namespace App\Listeners;

use Illuminate\Notifications\Events\NotificationSending;
use Illuminate\Support\Facades\Log;

class LogSendingNotificationListener
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
    public function handle(NotificationSending $event)
    {
        if (isset($event->notification->logSubject)) {
            activity()
                ->withProperties([
                    'id' => $event->notification->id,
                    'queue' => $event->notification->queue,
                    'delay' => $event->notification->delay,
                    'channel' => $event->channel,
                ])
                ->causedByAnonymous()
                ->event('notification')
                ->log("Notification trying to send ... Re: {$event->notification->logSubject} (To: {$event->notifiable->name}, ID: {$event->notifiable->id})");
        }
    }
}

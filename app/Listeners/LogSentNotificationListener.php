<?php

namespace App\Listeners;

use Illuminate\Notifications\Events\NotificationSent;
use Illuminate\Support\Facades\Log;

class LogSentNotificationListener
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
    public function handle(NotificationSent $event)
    {
        if (isset($event->notification->logSubject)) {
            activity()
                ->withProperties([
                    'id' => $event->notification->id,
                    'queue' => $event->notification->queue,
                    'delay' => $event->notification->delay,
                    'channel' => $event->channel,
                    'response' => $event->response,
                ])
                ->causedByAnonymous()
                ->event('notification')
                ->log("Notification sent ... Re: {$event->notification->logSubject} (To: {$event->notifiable->name}, ID: {$event->notifiable->id})");
        }
    }
}

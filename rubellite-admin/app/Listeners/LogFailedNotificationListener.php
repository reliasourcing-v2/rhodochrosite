<?php

namespace App\Listeners;

use Illuminate\Notifications\Events\NotificationFailed;
use Illuminate\Support\Facades\Log;

class LogFailedNotificationListener
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
    public function handle(NotificationFailed $event)
    {
        if (isset($event->notification->logSubject)) {
            activity()
                ->withProperties([
                    'id' => $event->notification->id,
                    'queue' => $event->notification->queue,
                    'delay' => $event->notification->delay,
                    'channel' => $event->channel,
                    'data' => $event->data,
                ])
                ->causedByAnonymous()
                ->event('notification')
                ->log("Notification sent ... Re: {$event->notification->logSubject} (To: {$event->notifiable->name}, ID: {$event->notifiable->id})");
        }
    }
}

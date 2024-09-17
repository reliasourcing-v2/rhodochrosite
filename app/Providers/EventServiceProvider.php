<?php

namespace App\Providers;

use App\Listeners\LogFailedNotificationListener;
use App\Listeners\LogSendingEmailListener;
use App\Listeners\LogSendingNotificationListener;
use App\Listeners\LogSentEmailListener;
use App\Listeners\LogSentNotificationListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Mail\Events\MessageSending;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Notifications\Events\NotificationFailed;
use Illuminate\Notifications\Events\NotificationSending;
use Illuminate\Notifications\Events\NotificationSent;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        MessageSending::class => [
            LogSendingEmailListener::class,
        ],
        MessageSent::class => [
            LogSentEmailListener::class,
        ],
        NotificationSending::class => [
            LogSendingNotificationListener::class,
        ],
        NotificationSent::class => [
            LogSentNotificationListener::class,
        ],
        NotificationFailed::class => [
            LogFailedNotificationListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}

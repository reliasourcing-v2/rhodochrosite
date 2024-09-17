<?php

namespace App\Notifications\Admins;

use Illuminate\Notifications\Action;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class Welcome extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * Create a notification instance.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $route = route('admin.password.reset', ['token' => $this->token, 'email' => $notifiable->email]);

        return (new MailMessage)
            ->subject(Lang::get('Welcome to ' . config('app.name')))
            ->greeting("Hello {$notifiable->first_name} {$notifiable->last_name}!")
            ->line(Lang::get('Your Admin account has been created.'))
            ->line(Lang::get('Click on the link below to set your account password.'))
            ->action(Lang::get('Set Password'), $route)
            ->line(Lang::get('This link will expire in :count minutes.', ['count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')]))
            ->line(Lang::get('Upon expiration, you may request a new password reset by using the Forgot Password feature in the Login Page.'))
            ->line(Lang::get('Thank you and stay safe!'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        $properties = [
            'token' => $this->token,
            'email' => $notifiable->email,
        ];

        return [
            'properties' => $properties,
            'message' => "Hello {$notifiable->first_name} {$notifiable->last_name}! Your Admin account has been created.",
            'title' => 'Welcome to ' . config('app.name'),
        ];
    }
}

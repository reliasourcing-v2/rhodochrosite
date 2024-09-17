<?php

namespace App\Models;

use App\Traits\ReadableTimestamp;
use Illuminate\Notifications\DatabaseNotification;

class Notification extends DatabaseNotification
{
    use ReadableTimestamp;

    public function user()
    {
        return $this->belongsTo(User::class, 'notifiable_id');
    }
}

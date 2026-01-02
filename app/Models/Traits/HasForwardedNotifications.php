<?php

namespace App\Models\Traits;

use App\Models\ForwardedNotification;

trait HasForwardedNotifications
{
    public function forwardedNotifications()
    {
        return $this->hasMany(ForwardedNotification::class);
    }
}

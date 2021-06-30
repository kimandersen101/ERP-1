<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Notification extends Model
{
    /**
     * Get the 'notifications' that belongs to 'alert' record.
     */
    public function user_notifications(): HasMany
    {
        return $this->hasMany(UserNotification::class);
    }

}

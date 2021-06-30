<?php

namespace App;

use App\Services\CustomHelper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class UserNotification extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $appends = ['is_global', 'is_read', 'date'];

    /**
     * Get the 'receiver' that belongs to 'user notification' record.
     */
    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }

    /**
     * Get the 'subject' that belongs to 'user notification' record.
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(User::class, 'subject_id', 'id');
    }

    /**
     * Get the 'alert' that belongs to 'user notification' record.
     */
    public function notification(): BelongsTo
    {
        return $this->belongsTo(Notification::class);
    }
}

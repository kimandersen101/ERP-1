<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class LeadHandoff extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    /**
     * Get the 'support' that belongs to 'lead handoff' record.
     */
    public function support(): BelongsTo
    {
        return $this->belongsTo(User::class, 'support_id', 'id');
    }

    /**
     * Get the 'agent' that belongs to 'agent task' record.
     */
    public function agent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'agent_id', 'id');
    }

    /**
     * Get the 'agent' that belongs to 'agent task' record.
     */
    public function lead_touch(): BelongsTo
    {
        return $this->belongsTo(LeadTouch::class);
    }

    /**
     * Get the 'agent' that belongs to 'agent task' record.
     */
    public function activity(): HasOne
    {
        return $this->hasOne(Activity::class, 'object_id', 'id')
            ->where('key', 'lead-handoff')
            ->with('parent_activity')
            ->with('children')
            ->latest();
    }
}

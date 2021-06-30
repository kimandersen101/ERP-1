<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgentEvent extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $appends = ['url', 'status'];

    public function getUrlAttribute()
    {
        return env('EVENT_URL') . '/';
    }

    public function getStatusAttribute()
    {
        return $this->expiry_date >= Carbon::now() ? 'active' : 'expired';
    }
}

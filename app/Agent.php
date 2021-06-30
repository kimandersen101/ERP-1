<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    /**
     * define custom primary key
     */
    protected $primaryKey = 'user_id';
    public $incrementing = false;

    /**
     * Get the 'user' that owns the 'agent' record.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

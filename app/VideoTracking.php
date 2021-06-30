<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VideoTracking extends Model
{
    protected $primaryKey = 'video_id';
    public $incrementing = false;

    protected $fillable = ['user_id', 'video_id', 'watched', 'played'];

    public function video(): BelongsTo
    {
        return $this->belongsTo(Video::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    public function tracking()
    {
        return $this->hasOne(VideoTracking::class);
    }
}

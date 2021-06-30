<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaticDatabase extends Model
{
    public static function getSettings()
    {
        return collect([
            (object) [
                'key' => 'video_limit',
                'value' => '80'
            ],

            (object) [
                'key' => 'brochure_seconds',
                'value' => '120'
            ],
        ]);
    }
}

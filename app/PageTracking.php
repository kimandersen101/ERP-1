<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageTracking extends Model
{
    //
    protected $fillable = ['user_id','page_id','type_id','time_in_seconds','completed_percent','call_to_action'];
}

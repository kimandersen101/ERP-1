<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $hidden = ['log', 'created_at', 'updated_at', 'deleted_at'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Page extends Model
{
    public function tracking() :HasOne
    {
        return $this->hasOne(PageTracking::class);
    }
}

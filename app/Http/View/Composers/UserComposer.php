<?php

namespace App\Http\View\Composers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\User;
use App\Activity;

class UserComposer
{
    public function compose(View $view)
    {
        $uid = request()->segment(1);


    }
}

<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;

class CookieHandler
{
    private static $UIDKey = 'UID-1';

    public static function getUID()
    {
        return isset($_COOKIE[self::$UIDKey]) ? $_COOKIE[self::$UIDKey] : false;
    }

    public static function setUID($uid)
    {
        $existingUID = self::getUID();
        if ($existingUID && $existingUID != $uid) {
            $admin_id = Session::get('admin_id');
            Session::flush();

            if( $admin_id )
                Session::put('admin_id', $admin_id);
        }
        setcookie(self::$UIDKey, $uid, time() + (86400 * 180), '/'); // 180 Days Expiry
        $_COOKIE[self::$UIDKey] = $uid;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class UserAddress extends Model
{
    protected $guarded = [];

    public static function findOrCreate($user_id, $address)
    {
        if( $user_id > 0 )
        {
            // make sure its only address field
            $address = Arr::only($address, ['state_id', 'city', 'zip', 'street', 'apartment']);
            $address['user_id'] = $user_id;
            return UserAddress::firstOrCreate($address);
        }

        return false;
    }
}

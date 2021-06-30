<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class ShopService
{
    public static function getTaxPercentage($address)
    {
        $response = Http::post(env('API_URL') . '/tax/percentage', Arr::only($address, ['street','city','zip']));

        return $response->body(); // tax percentage value e.g. 8.1
    }
}

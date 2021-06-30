<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Zipcode;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/trackvideo', 'VideoTrackingController');
Route::post('/tracking', 'PageTrackingController@index');

Route::get('/find-zone/{zip}', 'ZoneController@show');
Route::post('/cart/add-to-cart', 'CartController@addToCart')->name('add-to-cart');
Route::post('/cart/remove-from-cart', 'CartController@removeFromCart')->name('remove-from-cart');
Route::post('/cart/apply-promo', 'CartController@handlePromo')->name('apply-promo');
Route::post('/cart/admin-input', 'CartController@adminInput');
Route::post('/order/place-order', 'OrderController@placeOrder');
Route::post('/validate-user', 'UserController@validateUser');
Route::post('/validate-email', 'UserController@validateEmail');
Route::post('/recover-password', 'UserController@recoverPassword');
Route::post('/save-coapplicant', 'WaterController@saveCoApplicant');
Route::post('/save-affiliate', 'OrderController@saveAffiliate');
Route::post('/save-optin-lead', 'SiteController@saveOptinLead');

Route::post('/find-zone', function (Request $request) {

    if (isset($request->has_micron_system) && $request->has_micron_system == "1") {
        return 0;
    } else if (isset($request->is_well_water) && $request->is_well_water == "1") {
        return (!empty($request->has_filtration_system) && $request->has_filtration_system == "1") ? 3 : 5;
    } else {
        $Zipcode = Zipcode::select('zone')->firstWhere('zip', $request->zip);
        return $Zipcode ? $Zipcode->zone : 1;
    }
});

Route::post('/get-tax', function (Request $request) {
    $address = $request->address;
    $response = Http::post(env('API_URL') . '/tax/percentage', array(
        'zip' => $address['zip'],
        'street_address' => $address['street'],
        'city' => $address['city'],
    ));

    $shipping = null;
    $zipcode = Zipcode::firstWhere('zip', $address['zip']);
    if ($zipcode)
        $shipping = $zipcode->shipping_price;

    return response()->json(['status' => "Success", 'tax' => $response->body(), 'shipping' => $shipping]);
});

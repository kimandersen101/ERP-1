<?php

use Illuminate\Support\Facades\Route;
use App\Services\CookieHandler;
use App\Lead;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clearapp', function () {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Cleared!";

});

Route::get('/{identifier}', function ($identifier) {
    $uri = explode('/', $identifier);
    $uid = substr($uri[0], 2);
    if ($uid) {
        if( !Lead::where('uid', $uid)->exists() ){
            abort(404);
        }
        CookieHandler::setUID($uid);
    }
    unset($uri[0]);
    return redirect(implode('/', $uri));
})->where('identifier', '^u=(.*)');

Route::get('/admin-control/{hashids}', 'ShopController@adminControl');

Route::get('/', 'HomeController@optIn');
Route::get('/maintenance/filters-maintenance', 'SiteController@filterMaintenance');
Route::get('/maintenance/installation-instructions', 'SiteController@installationInstructions');
Route::get('/maintenance/well-water', 'SiteController@wellWater');
Route::get('/maintenance/wet6-installation', 'SiteController@wet6Installation');
Route::get('/maintenance/wet7-installation', 'SiteController@wet7Installation');
Route::get('/maintenance/post-installation-instructions', 'SiteController@postInstallationInstructions');
Route::get('/certification', 'SiteController@certification');
Route::get('/certification/test-report-2016', 'SiteController@testReport2016');
Route::get('/certification/test-report-2018', 'SiteController@testReport2018');
Route::get('/our-mission', 'SiteController@ourMission');
Route::get('/contact-us', 'SiteController@contactUs');


Route::get('/booklet', 'WaterController@brochure');
Route::get('/affiliate', 'WaterController@affiliate');
Route::get('/business/{slug?}', 'WaterController@business');
Route::get('/pictures', 'WaterController@pictures');
Route::get('/faq', 'WaterController@faq');
Route::get('/our-technology', 'WaterController@technology');
Route::get('/health-benefits/{slug}', 'WaterController@health_benefits');

//Route::get('/{unique_code}/shop', 'ShopController@index');  // Dont remove this, we need this later
Route::get('/shop/drinking-water', 'ShopController@drinkingWater')->name('shop');
Route::get('/cart/', 'CartController@index')->name('cart')->middleware('cart');
Route::get('/checkout/', 'CheckoutController@index')->name('checkout')->middleware('cart');

Route::get('/co-applicant/{financing_id}/', 'WaterController@co_applicant');

Route::get('/thank-you', 'WaterController@thank_you');
Route::get('/affiliate-thank-you', 'WaterController@affiliate_thank_you');


Route::get('/testimonial/{slug}', 'WaterController@testimonial');
Route::get('/article/{slug}', 'WaterController@article');

Route::get('/video/{slug?}', 'WaterController@index');

Route::get('/{optin_username}','SiteController@optin')->name('optin');

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'Api'], function() {
    Route::post('register','AuthController@register');
    Route::post('login','AuthController@login');

    //Start newpassword
    Route::post('resetPass','AuthController@resetPass');
    Route::post('newpassword','AuthController@newpassword');
    //Start newpassword




    Route::group(['middleware' => 'auth:api'], function () {
    //Start profile
    Route::get('getprofile','MainController@getprofile');
    Route::post('Updateprofile','MainController@Updateprofile');
    //End profile

    //Start notification_settings
    Route::post('notification-settings','AuthController@notification_settings');
    //End notification_settings


    //////////////////////////Start generalController//////////////////////////

    Route::get('Governorate','generalController@Governorate');
    Route::get('cities','generalController@cities');
    Route::get('Blood_Type','generalController@Blood_Type');

    //Start Contact
    Route::get('categories','generalController@categories');
    //End Contact

    //Start Contact
    Route::get('Notification','generalController@Notification');
    //End Contact

    //Start Contact
    Route::post('contacts','generalController@contacts');
    //End Contact

     //Start settings && aboat_us
     Route::get('settings','generalController@settings');
     Route::get('aboat-us','generalController@aboat_us');
     //End settings && aboat_us

    //////////////////////////END generalController//////////////////////////






    //////////////////////////Start Posts//////////////////////////


     Route::get('Posts','ApiPostController@Posts');
     Route::get('Post/{id}','ApiPostController@Post');
     Route::post('favouritePost','ApiPostController@favouritePost');
     Route::get('favouritePostsShow','ApiPostController@favouritePostsShow');

    //////////////////////////END Posts//////////////////////////


    //////////////////////////Start donations//////////////////////////


    Route::get('donations','DonationsController@donations');
    Route::get('donation/{id}','DonationsController@donation');
    Route::post('createDonation','DonationsController@createDonation');
   // Route::get('favouritePostsShow','ApiPostController@favouritePostsShow');

   //////////////////////////END donations//////////////////////////

    });
});






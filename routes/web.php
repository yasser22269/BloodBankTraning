<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
// Route::get('/', function () {
//     return view('home');
// });


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' =>['auth'] ],function () {
    //start contact
    Route::get('/contact', 'front\MainController@contact')->name('contact');
    Route::post('/postcontact', 'front\MainController@postcontact')->name('postcontact');
    //End contact

});

Route::get('/donation-requests', 'front\donationController@donations')->name('donation-requests');
Route::get('/donation-request/{id}', 'front\donationController@donation')->name('donation-request');
Route::get('/about-us', 'front\MainController@whoAreUs')->name('about-us');

Route::get('/Post/{id}', 'front\MainController@Post')->name('Post');
});

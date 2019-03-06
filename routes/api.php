<?php

use Illuminate\Http\Request;

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


Route::group(['prefix'=>'v1', 'namespace' => 'api'], function(){
    Route::get('governorates', 'MainController@governorates');
    Route::get('cities', 'MainController@cities');
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('reset', 'AuthController@reset');
    Route::post('password', 'AuthController@password');

    // Route::post('password', 'AuthController@password');
    
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('posts', 'MainController@posts');
        Route::get('categories', 'MainController@categories');
        Route::get('showPost/{id}', 'MainController@showPost');
        Route::get('profile/{id}', 'AuthController@profile');
        Route::put('profileEdit/{id}', 'AuthController@profileEdit');
        Route::post('orders', 'MainController@orders');
        Route::get('orderShow/{id}', 'MainController@orderShow');
        Route::post('contact', 'MainController@contact');
        Route::get('settings', 'MainController@settings');
        Route::post('postFavourite', 'MainController@postFavourite');
        Route::get('myFavourite', 'MainController@myFavourite');
        Route::post('registerToken', 'AuthController@registerToken');
        Route::post('removeToken', 'AuthController@removeToken');
        Route::post('notificationsSettings','AuthController@notificationsSettings');
        Route::get('notifications','MainController@notifications');
        Route::get('notificationsCount','MainController@notificationsCount');

    });     
    
});


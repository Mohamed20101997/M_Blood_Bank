<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('client', 'ClientController');
Route::resource('governorate', 'GovernorateController');
Route::resource('citie', 'CitieController');
Route::resource('post', 'PostController');
Route::resource('categorie', 'CategorieController');
Route::resource('notification', 'NotificationController');
Route::resource('setting', 'SettingController');
Route::resource('blood_type', 'Blood_TypeController');
Route::resource('contact', 'ContactController');
Route::resource('categorypost', 'CategoryPostController');
Route::resource('clientnotification', 'ClientNotificationController');
Route::resource('clientpost', 'ClientPostController');
Route::resource('order', 'OrderController');
Route::resource('bloodtypeclient', 'BloodTypeClientController');
Route::resource('clientsgovernorates', 'ClientsGovernoratesController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

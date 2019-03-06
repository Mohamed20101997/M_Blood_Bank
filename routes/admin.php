<?php

Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function(){
    Route::get('/', function(){ return view('admin.home');  });

Route::group(['middleware' => 'admin'], function() {
    //
});

    Route::resource('/governorate', 'GovernorateController');
    Route::resource('/citie', 'CitieController');
    Route::resource('/category', 'CategoryController');
    Route::resource('/client', 'ClientController');
    Route::any('/active/{id}', 'ClientController@active');
    Route::any('/deactive/{id}', 'ClientController@deactive');
    Route::resource('/post', 'PostController');
    Route::resource('/contact', 'ContactController');
    Route::resource('/order', 'OrderController');
    Route::resource('/setting', 'SettingsController');
});

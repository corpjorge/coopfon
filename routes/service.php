<?php


Route::group(['middleware' => 'auth'], function () {

    Route::get('service/install/{module}', ['as' => 'service.install', 'uses' => 'Service\InstallController@install']);
    Route::get('service/update/{module}', ['as' => 'service.update', 'uses' => 'Service\InstallController@update']);

    Route::resource('pqrs', 'UserController', ['except' => ['show']]);

});

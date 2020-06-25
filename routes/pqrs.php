<?php


Route::group(['middleware' => 'auth'], function () {

    Route::get('pqrs/install/{module}', ['as' => 'pqrs.install', 'uses' => 'Pqrs\InstallController@install']);
    Route::get('pqrs/upgrade/{module}', ['as' => 'pqrs.upgrade', 'uses' => 'Pqrs\InstallController@update']);

    Route::resource('pqrs', 'UserController', ['except' => ['show']]);

});

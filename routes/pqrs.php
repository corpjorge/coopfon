<?php


Route::group(['middleware' => 'auth'], function () {

    Route::get('pqrs/install/{module}', ['as' => 'pqrs.install', 'uses' => 'Pqrs\InstallController@install']);
    Route::get('pqrs/upgrade/{module}', ['as' => 'pqrs.upgrade', 'uses' => 'Pqrs\InstallController@update']);

    Route::resource('pqrs', 'Pqrs\PqrController', ['except' => ['show']]);
    Route::get('pqrs/reply', 'Pqrs\PqrController@reply')->name('pqrs.reply');
    Route::get('pqrs/file/{pqr}', 'Pqrs\PqrController@file')->name('pqrs.file');
    Route::get('pqrs/close', 'Pqrs\PqrController@close')->name('pqrs.close');
    Route::put('pqrs/move/{pqr}', 'Pqrs\PqrController@move')->name('pqrs.move');

});

<?php


Route::group(['middleware' => 'auth'], function () {

    Route::get('pqrs/install/{module}', ['as' => 'pqrs.install', 'uses' => 'Pqrs\InstallController@install']);
    Route::get('pqrs/upgrade/{module}', ['as' => 'pqrs.upgrade', 'uses' => 'Pqrs\InstallController@update']);

    // PQRS
    Route::resource('pqrs', 'Pqrs\PqrController', ['except' => ['show']]);
    Route::get('pqrs/reply', 'Pqrs\PqrController@reply')->name('pqrs.reply');
    Route::get('pqrs/file/{pqr}', 'Pqrs\PqrController@file')->name('pqrs.file');
    Route::get('pqrs/close', 'Pqrs\PqrController@close')->name('pqrs.close');
    Route::put('pqrs/move/{pqr}', 'Pqrs\PqrController@move')->name('pqrs.move');

    // PQRS external
    Route::get('pqrs-external', 'Pqrs\PqrExternalController@index')->name('pqrs_external.index');
    Route::get('pqrs-external/{pqr}/pqrs-external', 'Pqrs\PqrExternalController@edit')->name('pqrs_external.edit');
    Route::put('pqrs-external/{pqr}', 'Pqrs\PqrExternalController@update')->name('pqrs_external.update');
    Route::get('pqrs-external/file/{pqr}', 'Pqrs\PqrExternalController@file')->name('pqrs_external.file');
    Route::get('pqrs-external/close', 'Pqrs\PqrExternalController@close')->name('pqrs_external.close');
    Route::put('pqrs-external/move/{pqr}', 'Pqrs\PqrExternalController@move')->name('pqrs_external.move');

    // PQRS Conf
    Route::get('pqrs-config', 'Pqrs\PqrConfigController@index')->name('pqrs_config.index');
    Route::put('pqrs-config/{config}', 'Pqrs\PqrConfigController@update')->name('pqrs_config.update');
});

Route::get('pqrs-radicar', 'Pqrs\PqrExternalController@create')->name('pqrs_external.create');
Route::post('pqrs-external', 'Pqrs\PqrExternalController@store')->name('pqrs_external.store');

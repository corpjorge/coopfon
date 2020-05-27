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
  return view('pages.welcome');
})->name('welcome');

Auth::routes();

Route::get('register', 'HomeController@index')->name('register');


Route::get('home', 'HomeController@index')->name('home');
Route::get('dashboard', 'HomeController@index')->name('home');
Route::get('lock', 'ExamplePagesController@lock')->name('page.lock');
Route::get('error', ['as' => 'page.error', 'uses' => 'ExamplePagesController@error']);

Route::group(['middleware' => 'auth'], function () {

    Route::resource('role', 'RoleController', ['except' => ['show', 'destroy']]);
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::resource('module', 'Config\ModuleController', ['except' => ['show']]);

    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

});



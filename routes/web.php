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


Route::get('home', 'Config\HomeController@index')->name('home');
Route::get('dashboard', 'Config\HomeController@index')->name('home');
Route::get('lock', 'ExamplePagesController@lock')->name('page.lock');
Route::get('error', ['as' => 'page.error', 'uses' => 'ExamplePagesController@error']);

Route::group(['middleware' => 'auth'], function () {

    Route::resource('role', 'RoleController', ['except' => ['show', 'destroy']]);
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::put('users/{user}', ['as' => 'users.data', 'uses' => 'UserController@data']);
    Route::get('users/create', ['as' => 'users.create', 'uses' => 'Config\UsersController@create']);
    Route::post('users', ['as' => 'users.store', 'uses' => 'Config\UsersController@store']);
    Route::get('users', ['as' => 'users.index', 'uses' => 'Config\UsersController@index']);
    Route::delete('users/restore/{user}', ['as' => 'users.restore', 'uses' => 'Config\UsersController@restore']);
    Route::resource('admin', 'Config\AdminController', ['except' => ['show']]);

    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'Config\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'Config\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'Config\ProfileController@password']);
    Route::put('profile/data', ['as' => 'profile.data', 'uses' => 'Config\ProfileController@data']);

    Route::resource('module', 'Config\ModuleController', ['except' => ['show']]);

});



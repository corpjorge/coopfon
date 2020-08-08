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

Route::get('/', 'Page\WelcomeController@welcome')->name('welcome');

//Autentication Laravel
Auth::routes();
Route::get('register', 'Config\HomeController@index')->name('register');
Route::get('home', 'Config\HomeController@index')->name('home');
Route::get('dashboard', 'Config\HomeController@index')->name('dashboard');

//Login AUTH
Route::get('login/email', 'Auth\LoginDocumentController@showLoginForm');

//Login Document
Route::get('login/document', 'Auth\LoginDocumentController@showLoginForm');
Route::post('login/document', 'Auth\LoginDocumentController@login')->name('login.document');

//Login Financial
Route::get('login/financial', 'Auth\LoginFinancialController@showLoginForm');
Route::post('login/financial', 'Auth\LoginFinancialController@login')->name('login.financial');

//Login Socialite
Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');

//Manage birth Day
Route::get('felicitaciones/coment/{id}', 'Config\BirthDateController@coment');
Route::get('felicitaciones/{user}/{name}', 'Config\BirthDateController@show')->name('felicitaciones.show');
Route::post('felicitaciones/', 'Config\BirthDateController@store')->name('felicitaciones.store');


Route::group(['middleware' => 'auth'], function () {

    //System external
    Route::get('system-external/financial', 'External_system\FinancialController')->name('system-external.financial');

    //Manage asociados
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::put('users/{user}', ['as' => 'users.data', 'uses' => 'UserController@data']);
    Route::get('users/create', ['as' => 'users.create', 'uses' => 'Config\UsersController@create']);
    Route::post('users', ['as' => 'users.store', 'uses' => 'Config\UsersController@store']);
    Route::get('users', ['as' => 'users.index', 'uses' => 'Config\UsersController@index']);
    Route::delete('users/restore/{user}', ['as' => 'users.restore', 'uses' => 'Config\UsersController@restore']);

    //Manage admins
    Route::resource('admin', 'Config\AdminController', ['except' => ['show']]);
    Route::put('admins/{user}', ['as' => 'admins.data', 'uses' => 'Config\AdminController@data']);
    Route::get('admins/find/{idInput?}/{value?}', ['as' => 'admins.find', 'uses' => 'Config\AdminController@find']);
    Route::put('admins/find/{admin}', ['as' => 'admins.enroll', 'uses' => 'Config\AdminController@enRoll']);
    Route::get('admins', ['as' => 'admins.index', 'uses' => 'Config\AdminController@indexDelete']);
    Route::delete('admin/restore/{admin}', ['as' => 'admin.restore', 'uses' => 'Config\AdminController@restore']);

    //Manage profile
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'Config\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'Config\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'Config\ProfileController@password']);
    Route::put('profile/data', ['as' => 'profile.data', 'uses' => 'Config\ProfileController@data']);

    //Manage roles
    Route::resource('role', 'RoleController', ['except' => ['show', 'destroy']]);

    //Manage Auths
    Route::resource('auths', 'Config\AuthController', ['except' => ['show', 'create']]);
    Route::put('auths/status/{auth}', ['as' => 'auths.status', 'uses' => 'Config\AuthController@status']);

    //Manage External Systems
    Route::resource('external-system', 'Config\ExternalSystemController', ['except' => ['show', 'create']]);
    Route::put('ExternalSystem/status/{externalSystem}', ['as' => 'external-system.status', 'uses' => 'Config\ExternalSystemController@status']);

    //Manage Modules
    Route::resource('module', 'Config\ModuleController', ['except' => ['show', 'create']]);
    Route::delete('module/{admin}/restore', ['as' => 'module.restore', 'uses' => 'Config\ModuleController@restore']);

    //Search
    Route::get('search/users/{users?}', 'Config\SearchController@users');

});

<?php

use Illuminate\Support\Facades\Route;

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

Route::dashboard(false)->group(function() {
    Route::get('login', 'Auth\\LoginController@show')
        ->name('login.show');
    Route::post('login', 'Auth\\LoginController@login')
        ->name('login.login');
});


Route::dashboard()->group(function() {
    Route::get('logout', 'Auth\\LoginController@logout')
        ->name('login.logout');
    Route::get('me', 'Auth\\MeController@show')->name('me.show');
    Route::put('me', 'Auth\\MeController@update')->name('me.update');
    Route::resource('users', 'UserController');
    Route::get('/roles', 'RoleController@index')
        ->name('roles.index');
});

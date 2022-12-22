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

Route::group(['namespace' => 'Admin'], function () {

    Route::group(['prefix' => 'backend', 'middleware' => 'auth'], function () {
        Route::get('/home', 'HomeController@index')->name('backend.home');
        Route::resource('user', 'UsersController');
    });
});

Route::group(['prefix' => 'user'], function() {
    Route::get('/login', 'Auth\AuthsController@getLogin')->name('login');
    Route::post('/login', 'Auth\AuthsController@postLogin')->name('post.login');
    Route::get('/register', 'Auth\AuthsController@getRegister')->name('register');
    Route::get('/logout', 'Auth\AuthsController@getLogout')->name('logout');
    Route::get('/forgot', 'Auth\AuthsController@getforgot')->name('forgot');
});

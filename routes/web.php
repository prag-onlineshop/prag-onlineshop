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
    return view('L');
});

Route::get('/user', function () {
    return view('user.home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']], function() {
    Route::get('/', function () {
        return view('admin.home');
    });
});

Route::get('/loginForm', function () {
    return view('loginForm');
});

Route::get('/forgotPass', function () {
    return view('forgotPass');
});

Route::get('/resetPass', function () {
    return view('resetPass');
});



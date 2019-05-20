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


Route::get('/', 'ProductController@index');

Route::view('/userlogin','user.userLogin');
Route::view('/userData','user.userForm');
Route::get('/userprofile','ProfileController@index');

Route::get('/profile', 'ProfileController@index');
Route::post('/updateProfile', 'ProfileController@updateProfile');

Route::get('/cart', 'CartController@index');
Route::get('/cart/addItem/{id}', 'CartController@addItem');
Route::get('/cart/update/{id}', 'CartController@update');
Route::put('/cart/update/{id}', 'CartController@update');
Route::get('/cart/remove/{id}', 'CartController@destroy');

Auth::routes();

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']], function() {
    Route::get('/', function () {
        return view('admin.home');
    });
    Route::resource('/product', 'ProductController');
});

Route::get('/userLogin', function () {
    return view('user.userLogin');
});

Route::get('/forgotPass', function () {
    return view('user.userForgotPassword');
});

Route::get('/resetPass', function () {
    return view('resetPass');
});



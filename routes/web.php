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
    return view('user.userHome');
});

Route::view('/userlogin','user.userLogin');

Route::get('/profile', 'ProfileController@index');
Route::post('/updateProfile', 'ProfileController@updateProfile');

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

// <<<<<<< HEAD
Route::get('brand', 'BrandController@index')->name('brand.index');
Route::post('brand', 'BrandController@store')->name('brand.store');
Route::get('brand/create', 'BrandController@create')->name('brand.create');
Route::get('brand/{brand}', 'BrandController@show')->name('brand.profile');
Route::get('brand/{brand}/edit', 'BrandController@edit')->name('brand.edit');
Route::patch('brand/{brand}', 'BrandController@update')->name('brand.update');
Route::delete('brand/{brand}', 'BrandController@destroy')->name('brand.delete');
// =======
// >>>>>>> ee787582356f6ccbef5c0d87db3c6705b6d6db5e


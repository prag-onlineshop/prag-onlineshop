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

<<<<<<< HEAD
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('categories', 'CategoriesController');

Route::get('/categories/{category}/delete', 'CategoriesController@delete')->name('categories.delete');

Route::get('/category/{url}', 'CategoriesController@url');
=======

Route::get('/', function () {
    return view('user.content');
});

Route::view('/userlogin','user.userLogin');
Route::view('/userData','user.userForm');
Route::get('/userprofile','ProfileController@index');

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

>>>>>>> 9c5e5c8a629d9b64a0eac0ac2d10143967c9f92d

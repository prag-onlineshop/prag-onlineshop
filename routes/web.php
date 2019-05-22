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




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('categories', 'CategoriesController');

Route::get('categoriesList-Admin', 'CategoriesController@index');

Route::get('/categories/{category}/delete', 'CategoriesController@delete')->name('categories.delete');

Route::get('/category/{url}', 'CategoriesController@url');

Route::get('/', 'ProductController@index');

Route::view('/userlogin','user.userLogin');
Route::view('/signup','user.registration');
Route::view('/userData','user.userForm'); 
//Route::view('/categoriesList-Admin','admin.contentLayouts.CategoriesList'); 
Route::get('/userprofile','ProfileController@index');
Route::get('/productDetail/{id}','CartController@detailPro');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/profile', 'ProfileController@index');
    Route::post('/updateProfile', 'ProfileController@updateProfile');
    Route::get('/cart', 'CartController@index');
    Route::get('/cart/addItem/{id}', 'CartController@addItem');
    Route::get('/cart/update/{id}', 'CartController@update');
    Route::put('/cart/update/{id}', 'CartController@update');
    Route::get('/cart/remove/{id}', 'CartController@destroy'); 
});



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


Route::get('brand', 'BrandController@index')->name('brand.index');
Route::post('brand', 'BrandController@store')->name('brand.store');
Route::get('brand/create', 'BrandController@create')->name('brand.create');
Route::get('brand/{brand}', 'BrandController@show')->name('brand.profile');
Route::get('brand/{brand}/edit', 'BrandController@edit')->name('brand.edit');
Route::patch('brand/{brand}', 'BrandController@update')->name('brand.update');
Route::delete('brand/{brand}', 'BrandController@destroy')->name('brand.delete');

//Route::get('brand/{brand}', 'BrandController@getURL');





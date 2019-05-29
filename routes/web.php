<?php



Auth::routes();

//Home Routes
// Route::get('/', 'ProductsController@indexHome');
// Route::get('/home', 'HomeController@index')->name('home');

//Category Routes
// Route::resource('categories', 'CategoriesController');
// Route::get('/categories/{category}/delete', 'CategoriesController@delete');

//Admin Routes

Route::resource('admin/category', 'AdminCategoryController');
Route::post('admin/category/update','AdminCategoryController@update')->name('category.update');

Route::delete('/category/destroy/{id}', 'AdminCategoryController@destroy');

// Route::get('admin/category/list', 'AdminController@index');
// Route::get('categories-list', 'AdminController@categoriesList'); 


// Route::get('categoriesList-Admin', 'AdminController@');
// Route::get('admin/categories', 'AdminController@index');
// Route::get('list', 'AdminController@index')->name('list.category');
// Route::get('/categoriesList-Admin/{category}/delete', 'AdminController@delete');

// Product Routes
// Route::resource('products', 'ProductsController');
// Route::get('/products/{product}/delete', 'ProductsController@delete')->name('products.delete');



// Route::get('/userprofile','ProfileController@index');
// Route::get('/productDetail/{id}','CartController@detailPro');

// Route::group(['middleware'=>'auth'], function(){
//     Route::get('/profile', 'ProfileController@index');
//     Route::post('/updateProfile', 'ProfileController@updateProfile');
//     Route::get('/cart', 'CartController@index');
//     Route::get('/cart/addItem/{id}', 'CartController@addItem');
//     Route::get('/cart/update/{id}', 'CartController@update');
//     Route::put('/cart/update/{id}', 'CartController@update');
//     Route::get('/cart/remove/{id}', 'CartController@destroy');
//     Route::get ('/checkout', 'CheckoutController@index');
//     Route::post('/addCheckOut', 'CheckoutController@addCheckOut');
//     Route::get('/orders', 'ProfileController@orders'); 
// });



// Route::group(['prefix'=>'admin','middleware'=>['auth','admin']], function() {
//     Route::get('/', function () {
//         return view('admin.home');
//     });
//     Route::resource('/product', 'ProductController');
// });


// Route::view('/profileOrder','user.profileOrder');


// Route::get('brand', 'BrandController@index')->name('brand.index');
// Route::post('brand', 'BrandController@store')->name('brand.store');
// Route::get('brand/create', 'BrandController@create')->name('brand.create');
// Route::get('brand/{brand}', 'BrandController@show')->name('brand.profile');
// Route::get('brand/{url}/edit', 'BrandController@edit')->name('brand.edit');
// Route::patch('brand/{url}', 'BrandController@update')->name('brand.update');
// Route::delete('brand/{brand}', 'BrandController@destroy')->name('brand.delete');







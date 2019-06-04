<?php



Auth::routes();

//Home Routes

Route::get('/', 'ProductsController@indexHome');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/category-products/{category}', 'ProductsController@showCates')->name('category.showCates');
Route::get('/brand-products/{brand}', 'ProductsController@productBrand');
Route::get('/search-item', 'ProductsController@itemSearch');
Route::get('/productDetail/{id}','CartController@detailPro');

//Admin Routes
// Route::get('admin/dashboard', function(){
//     return view('admin.dashboard.dashboard');
// });
Route::get('admin/settings', function(){
    return view('admin.setting.settings');
});
Route::get('admin/reports', function(){
    return view('admin.report.reports');
});
Route::get('admin/orders', 'AdminController@orders');
Route::get('admin/ordersid/{id}', 'AdminController@ordersId');

Route::get('admin/coupons', function(){
    return view('admin.contentLayouts.couponsIndex');
});

Route::get('admin/couponcrud', function(){
    return view('admin.contentLayouts.CouponCrud');
});

Route::resource('admin/coupon', 'AdminCouponsController');
Route::post('admin/add-coupon', 'AdminCouponsController@store');


// Admin Brand Controller
Route::resource('admin/brands', 'AdminBrandController');
Route::get('admin/list', 'AdminBrandController@index')->name('brands.index');
Route::post('admin/store', 'AdminBrandController@store')->name('brand.store');
Route::post('admin/brands/update', 'AdminBrandController@update')->name('brands.update');
Route::delete('/brand/destroy/{id}', 'AdminBrandController@destroy');


// Admin Category Controller
Route::resource('admin/category', 'AdminCategoryController');
Route::post('admin/category/update','AdminCategoryController@update')->name('categories.update');
Route::delete('/category/destroy/{id}', 'AdminCategoryController@destroy');

//Admin product Controller 
Route::resource('admin/products', 'AdminProductController');
Route::get('admin/list', 'AdminProductController@index')->name('products.index');
Route::post('admin/products/update', 'AdminProductController@update')->name('products.update');
Route::delete('/products/destroy/{id}', 'AdminProductController@destroy');




Route::get('/userprofile','ProfileController@index');


Route::group(['middleware'=>'auth'], function(){
    Route::get('/profile', 'ProfileController@index');
    Route::post('/updateProfile', 'ProfileController@updateProfile');
    Route::get('/cart', 'CartController@index');
    Route::get('/cart/addItem/{id}', 'CartController@addItem');
    Route::get('/cart/update/{id}', 'CartController@update');
    Route::put('/cart/update/{id}', 'CartController@update');
    Route::delete('/cart/remove/{id}', 'CartController@destroy');
    Route::get('/checkout', 'CheckOutController@index');
    Route::post('/addCheckOut', 'CheckOutController@addCheckOut');
    Route::get('/orders', 'ProfileController@orders');
    
//     //Coupons
    Route::post('/coupon', 'CouponsController@stored')->name('coupons.store');
    Route::delete('/coupon', 'CouponsController@destroy')->name('coupons.destroy'); 
});


    //Route for dashboard
    Route::get('admin/dashboard', 'DashboardController@index');



Route::group(['prefix'=>'admin','middleware'=>['auth','admin']], function() {
 

   //Route for coupon
    Route::get('Coupons', 'CouponController@index');
    Route::get('Coupons/create', 'CouponController@create')->name('coupon.create');
    Route::post('Coupons', 'CouponController@store')->name('coupon.store');
    Route::get('Coupons/{coupon}/edit', 'CouponController@edit')->name('coupon.edit');
    Route::delete('Coupons/{coupon}', 'CouponController@destroy')->name('coupon.delete');
    Route::patch('Coupons/{coupon}', 'CouponController@update')->name('coupon.update');





});

Route::group(['middleware'=>'auth'], function(){
    Route::get('/profile', 'ProfileController@index');
    Route::post('/updateProfile', 'ProfileController@updateProfile');
    Route::get('/cart', 'CartController@index');
    Route::get('/cart/addItem/{id}', 'CartController@addItem');
    Route::get('/cart/update/{id}', 'CartController@update');
    Route::put('/cart/update/{id}', 'CartController@update');
    Route::get('/cart/remove/{id}', 'CartController@destroy');
    Route::get ('/checkout', 'CheckoutController@index');
    Route::post('/addCheckOut', 'CheckoutController@addCheckOut');
    Route::get('/orders', 'ProfileController@orders'); 
});



Route::view('/profileOrder','user.profileOrder');



// //Route for coupon
// Route::get('Coupons', 'CouponController@index');
// Route::get('Coupons/create', 'CouponController@create')->name('coupon.create');
// Route::post('Coupons', 'CouponController@store')->name('coupon.store');
// Route::get('Coupons/{slug}/edit', 'CouponController@edit')->name('coupon.edit');
// Route::delete('Coupons/{coupon}', 'CouponController@destroy')->name('coupon.delete');
// Route::patch('Coupons/{coupon}', 'CouponController@update')->name('coupon.update');


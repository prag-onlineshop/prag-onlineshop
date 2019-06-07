<?php



Auth::routes();

//Home Routes

Route::get('/', 'ProductsController@indexHome');
Route::get('/category-products/{category}', 'ProductsController@showCates')->name('category.showCates');
Route::get('/brand-products/{brand}', 'ProductsController@productBrand');
Route::get('/search-item', 'ProductsController@itemSearch');
Route::get('/productDetail/{id}','CartController@detailPro');

Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

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
    Route::delete('/orders/{order}','ProfileController@delete')->name('order.delete');
    Route::get('/userprofile','ProfileController@index');
    Route::view('/profileOrder','user.profileOrder'); 
    
    //Coupons
    Route::post('/coupon', 'CouponsController@stored')->name('coupons.store');
    Route::delete('/coupon', 'CouponsController@destroy')->name('coupons.destroy'); 
});


/* -------------------- ADMIN ---------------------- */   
Route::delete('/brand/destroy/{id}', 'AdminBrandController@destroy');
Route::delete('/category/destroy/{id}', 'AdminCategoryController@destroy');
Route::delete('/products/destroy/{id}', 'AdminProductController@destroy');

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']], function() {
   //Route for coupon
    Route::get('Coupons', 'CouponController@index');
    Route::get('Coupons/create', 'CouponController@create')->name('coupon.create');
    Route::post('Coupons', 'CouponController@store')->name('coupon.store');
    Route::get('Coupons/{coupon}/edit', 'CouponController@edit')->name('coupon.edit');
    Route::delete('Coupons/{coupon}', 'CouponController@destroy')->name('coupon.delete');
    Route::patch('Coupons/{coupon}', 'CouponController@update')->name('coupon.update');

    //Route for dashboard
    Route::get('dashboard', 'DashboardController@index');

    // Admin Brand Controller
    Route::resource('brands', 'AdminBrandController');
    Route::get('list', 'AdminBrandController@index')->name('brands.index');
    Route::post('store', 'AdminBrandController@store')->name('brand.store');
    Route::post('brands/update', 'AdminBrandController@update')->name('brands.update');

    // Admin Category Controller
    Route::resource('category', 'AdminCategoryController');
    Route::post('category/update','AdminCategoryController@update')->name('categories.update');

    //Admin product Controller 
    Route::resource('products', 'AdminProductController');
    Route::get('list', 'AdminProductController@index')->name('products.index');
    Route::post('products/update', 'AdminProductController@update')->name('products.update');

    //Admin Coupon
    Route::resource('coupon', 'AdminCouponsController');
    Route::post('add-coupon', 'AdminCouponsController@store');
    Route::get('coupons', function(){
        return view('admin.contentLayouts.couponsIndex');
    });

    //Admin Settings
    Route::get('settings','SettingsController@index');
    Route::post('settings','SettingsController@store')->name('settings.store');
    Route::delete('settings/{id}','SettingsController@destroy')->name('image.destroy');
    
    //Admin Orders
    Route::get('orders', 'AdminController@orders');
    Route::get('ordersid/{id}', 'AdminController@ordersId');
    Route::patch('ordersid/{order}','AdminController@statusUpdate');
});
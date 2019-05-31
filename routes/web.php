<?php



Auth::routes();

//Home Routes

Route::get('/', 'ProductsController@indexHome');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/category/{category}', 'ProductsController@showCates')->name('category.showCates');
Route::get('/brand-products/{brand}', 'ProductsController@productBrand');
Route::get('/search-item', 'ProductsController@itemSearch');
Route::get('/productDetail/{id}','CartController@detailPro');

//Category Routes
// Route::resource('categories', 'CategoriesController');
// Route::get('/categories/{category}/delete', 'CategoriesController@delete');

//Admin Routes
Route::get('admin/dashboard', function(){
    return view('admin.dashboard.dashboard');
});
Route::get('admin/settings', function(){
    return view('admin.setting.settings');
});
Route::get('admin/reports', function(){
    return view('admin.report.reports');
});
Route::get('admin/orders', 'AdminController@orders');

Route::get('admin/products', function(){
    return view('admin.contentLayouts.productsIndex');
});
Route::get('admin/categories', function(){
    //removed from controller, returns error message 'undefined variable: categories'
    return view('admin.contentLayouts.categoriesIndex');
});
Route::get('admin/brands', function(){
    return view('admin.contentLayouts.brandsIndex');
});
Route::get('admin/coupons', function(){
    return view('admin.contentLayouts.couponsIndex');
});

Route::get('admin/couponcrud', function(){
    return view('admin.contentLayouts.CouponCrud');
});

Route::resource('admin/coupon', 'AdminCouponsController');
Route::post('admin/add-coupon', 'AdminCouponsController@store');

// Route::resource('categoriesList-Admin', 'AdminController');
// Route::get('/categoriesList-Admin/{category}/delete', 'AdminController@delete');

Route::resource('admin/category', 'AdminCategoryController');
Route::post('admin/category/update','AdminCategoryController@update')->name('category.update');

Route::delete('/category/destroy/{id}', 'AdminCategoryController@destroy');

Route::get('/userprofile','ProfileController@index');


Route::group(['middleware'=>'auth'], function(){
    Route::get('/profile', 'ProfileController@index');
    Route::post('/updateProfile', 'ProfileController@updateProfile');
    Route::get('/cart', 'CartController@index');
    Route::get('/cart/addItem/{id}', 'CartController@addItem');
    Route::get('/cart/update/{id}', 'CartController@update');
    Route::put('/cart/update/{id}', 'CartController@update');
    Route::get('/cart/remove/{id}', 'CartController@destroy');
    Route::get('/checkout', 'CheckOutController@index');
    Route::post('/addCheckOut', 'CheckOutController@addCheckOut');
    Route::get('/orders', 'ProfileController@orders');
    
    //Coupons
    Route::post('/coupon', 'CouponsController@stored')->name('coupons.store');
    Route::delete('/coupon', 'CouponsController@destroy')->name('coupons.destroy'); 
});



Route::group(['prefix'=>'admin','middleware'=>['auth','admin']], function() {
    Route::get('/', function () {
        return view('admin.home');
    });
    Route::resource('/product', 'ProductController');
    Route::resource('categoriesList-Admin', 'AdminController');

    //Route for brand
    Route::get('brand', 'BrandController@index')->name('brand.index');
    Route::post('brand', 'BrandController@store')->name('brand.store');
    Route::get('brand/create', 'BrandController@create')->name('brand.create');
    Route::get('brand/{brand}', 'BrandController@show')->name('brand.profile');
    Route::get('brand/{url}/edit', 'BrandController@edit')->name('brand.edit');
    Route::patch('brand/{url}', 'BrandController@update')->name('brand.update');
    Route::delete('brand/{brand}', 'BrandController@destroy')->name('brand.delete');

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


//Route for brand
Route::get('brand', 'BrandController@index')->name('brand.index');
Route::post('brand', 'BrandController@store')->name('brand.store');
Route::get('brand/create', 'BrandController@create')->name('brand.create');
Route::get('brand/{slug}', 'BrandController@show')->name('brand.profile');
Route::get('brand/{slug}/edit', 'BrandController@edit')->name('brand.edit');
Route::patch('brand/{brand}', 'BrandController@update')->name('brand.update');
Route::delete('brand/{brand}', 'BrandController@destroy')->name('brand.delete');


//Route for coupon
Route::get('Coupons', 'CouponController@index');
Route::get('Coupons/create', 'CouponController@create')->name('coupon.create');
Route::post('Coupons', 'CouponController@store')->name('coupon.store');
Route::get('Coupons/{slug}/edit', 'CouponController@edit')->name('coupon.edit');
Route::delete('Coupons/{coupon}', 'CouponController@destroy')->name('coupon.delete');
Route::patch('Coupons/{coupon}', 'CouponController@update')->name('coupon.update');



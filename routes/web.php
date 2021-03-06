<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/portfolio',                'PortfolioController@index')->name('portfolio');
Route::get('/search',                   'SearchController@index')->name('search');
Route::post('/search/result',           'SearchController@result')->name('search.result');

Route::get('/cart',                     'ShoppingController@index')->name('cart');
Route::post('/cart/add',                'ShoppingController@add_to_cart');
Route::post('/cart/checkout',           'ShoppingController@checkout')->name('cart.checkout');
Route::post('/cart/update',             'ShoppingController@update');
Route::delete('/cart/delete/{product}', 'ShoppingController@delete_from_cart')->name('delete.from.cart');

Route::get('/orders',                   'OrderController@index')->name('show.orders');

Route::get('/contact',                  'ContactController@index')->name('contact');
Route::post('/contact/message',         'ContactController@message')->name('contact.message');

Route::group(['middleware' => ['auth', 'admin', 'web']], function () {
	Route::get('/admin', 'AdminController@index')->name('admin');

    Route::get('/admin/products/manage/count',       'Admin\ProductController@manage_count')->name('products.manage.count');
    Route::post('/admin/products/per-page',          'Admin\ProductController@perPage')->name('per-page');
    Route::post('/admin/products/per-category-page', 'Admin\ProductController@perCategoryPage')->name('per-category-page');
    Route::resource('/admin/products',               'Admin\ProductController');
	
    Route::resource('/admin/categories',      'Admin\CategoryController');
    Route::resource('/admin/users',           'Admin\UserController');
    Route::resource('/admin/orders',          'Admin\OrderController');

    Route::get('/admin/favicon',              'Admin\FaviconController@index')->name('admin.favicon');
    Route::post('/admin/favicon/store',       'Admin\FaviconController@store')->name('admin.favicon.store');

    Route::get('/admin/history',              'Admin\OrderController@history')->name('orders.history');
    Route::delete('/admin/order/delete/{id}', 'Admin\OrderController@delete_permanently')->name('orders.delete.permanently');

    Route::get('/admin/soc-icons',            'Admin\SocIconController@index')->name('admin.soc-icons');
    Route::post('/admin/soc-icons',           'Admin\SocIconController@store')->name('admin.soc-icons.store');

    Route::get('/admin/contact',              'Admin\ContactController@index')->name('admin.contact');
    Route::post('/admin/contact',             'Admin\ContactController@store')->name('admin.contact.store');
});

Route::get('/{category}',         'CategoryController@index')->name('category');
Route::get('/products/{product}', 'ProductController@show')->name('product');

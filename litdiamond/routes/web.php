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
Route::get('/', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');
Route::get('/register', 'HomeController@signup');
Route::post('/register', 'HomeController@register');
Route::get('/categories', 'CategoriesController@index');
Route::get('/products/{CategoryID}', 'ProductsController@index');
Route::get('/product-detail/{ProductID}', 'ProductsController@detail');
Route::get('/cart', 'CartController@index');
Route::get('/add-to-cart/{ProductID}', 'CartController@add');
Route::get('/checkout', 'CartController@checkout');
Route::post('/checkout', 'CartController@checkout_submit');

Route::get('/admin', 'Admin\LoginController@index');
Route::post('/admin', 'Admin\LoginController@submit_login');

Route::get('/admin/logout', 'Admin\DashboardController@logout');

Route::get('/admin/dashboard', 'Admin\DashboardController@index');

// Categories Module
Route::get('/admin/categories', 'Admin\CategoriesController@index');
Route::post('/admin/categories', 'Admin\CategoriesController@delete');
Route::get('/admin/categories/add', 'Admin\CategoriesController@add');
Route::post('/admin/categories/add', 'Admin\CategoriesController@save');
Route::get('/admin/categories/edit/{ItemID}', 'Admin\CategoriesController@edit');
Route::post('/admin/categories/edit/{ItemID}', 'Admin\CategoriesController@update');

// Products Module
Route::get('/admin/products', 'Admin\ProductsController@index');
Route::post('/admin/products', 'Admin\ProductsController@delete');
Route::get('/admin/products/add', 'Admin\ProductsController@add');
Route::post('/admin/products/add', 'Admin\ProductsController@save');
Route::get('/admin/products/edit/{ItemID}', 'Admin\ProductsController@edit');
Route::post('/admin/products/edit/{ItemID}', 'Admin\ProductsController@update');

//Order Module
Route::get('/admin/orders', 'Admin\OrdersController@index');
Route::get('/admin/orders', 'Admin\OrdersController@order_details');
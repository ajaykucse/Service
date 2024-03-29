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
    return view('welcome');
});

Route::match(['get','post'], '/admin','AdminController@index');

Route::get('/admin/dashboard','AdminController@create');
Route::get('/admin/product-list','AdminController@list');
Route::get('/admin/product/{Code}','AdminController@product');

Route::match(['get','post'], '/add-cart','AdminController@addtocart');
Route::match(['get','post'], '/cart','AdminController@cart');
Route::get('/cart/delete-product/{id}','AdminController@destroy');
Route::get('/cart/update-quantity/{id}/{quantity}','AdminController@updateCartQuantity');
Route::match(['get','post'], '/checkout','AdminController@checkout');
Route::match(['get','post'], '/order-review','AdminController@orderReview');
Route::match(['get','post'], '/place-order','AdminController@placeOrder');
Route::get('/thanks','AdminController@thanks');
Route::get('/cust-orders','AdminController@custOrders');
Route::get('/cust-orders/{id}','AdminController@custOrderDetails');

Route::get('/logout','AdminController@logout');
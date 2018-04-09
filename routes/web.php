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
    return view('index');
})->name('index');

Auth::routes();

Route::get('/spanel','Seller\SellerController@index')->name('sellerpanel');//->middleware('seller')
Route::get('/home', function () {
    return view('index');
})->name('home');

/* Product Section */
Route::get('/add_product','Product\ProductController@add')->name('addproduct');

/*Categories Section*/
Route::get('/add_cat','Categories\CategoriesController@showadd')->name('addcat');
Route::get('/createcat','Categories\CategoriesController@create')->name('createcat');
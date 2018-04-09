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

Route::get('/', function () {
    return view('index');
})->name('index');


Route::get('/home', function () {
    return view('index');
})->name('home');

Route::prefix('users')->group(function(){
Route::get('/spanel','Seller\SellerController@index')->name('sellerpanel');//->middleware('seller')

});

/* Product Section */
Route::prefix('dealers')->group(function(){
Route::get('/add_product','Product\ProductController@add')->name('addproduct');
});

/*Categories Section*/


Route::prefix('admins')->group(function(){
Route::get('/categories/add','Categories\CategoriesController@showadd')->name('addcat');
Route::post('/categories/create','Categories\CategoriesController@createadd')->name('createcat');
Route::get('/categories/index','Categories\CategoriesController@index')->name('indexcat');
Route::get('/dashboard','DashboardController@index')->name('dashboardindex');

// Route::get('/categories/details/{id}','Categories\CategoriesController@details')->name('cat.details');
Route::get('/categories/edit/{id}','Categories\CategoriesController@showedit')->name('cat.edit');
Route::post('/categories/update/{id}','Categories\CategoriesController@update')->name('cat.update');
Route::get('/categories/delete/{id}','Categories\CategoriesController@delete')->name('cat.delete');
});
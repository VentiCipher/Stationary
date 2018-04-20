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

//Route::get('/','Index\MainController@index'), function () {
//    return view('index');
//})->name('index');
Route::get('/', 'Index\MainController@index')->name('index');//->middleware('seller')
Route::get('/home', 'Index\MainController@index')->name('home');//->middleware('seller')

//Route::get('/home', function () {
//    return view('index');
//})->name('home');


Route::prefix('users')->group(function () {
    Route::get('/ssubscribe', 'Index\MainController@showsub')->name('showsub');//->middleware('seller')
    Route::post('/sub', 'Index\MainController@upsub')->name('upsub');//->middleware('seller')


    Route::get('/wish/add{id}', 'Product\UserController@add')->name('addtowish');//->middleware('seller')
    Route::get('/wish/delete{id}', 'Product\UserController@remove')->name('removetowish');//->middleware('seller')
    Route::get('/wishlist', 'Product\UserController@index')->name('wishlist.index');//->middleware('seller')
    Route::post('/products/search', 'SearchController@search')->name('user.show.search');
    Route::get('/products/{id}', 'SearchController@showcat')->name('user.show.cat');
    Route::get('/dproducts/{id}', 'SearchController@showdealer')->name('user.show.deal');
    Route::get('/explore/{id}', 'SearchController@showdetails')->name('user.show.explore');

    Route::get('/addtocart/{id}', 'Product\CartController@add')->name('addtocart');
    Route::get('/removefromcart/{id}', 'Product\CartController@remove')->name('removefromcart');
    Route::get('/removefromcart1/{id}', 'Product\CartController@decrease')->name('decrease');
    Route::get('/cart', 'Product\CartController@index')->name('cart.index');
});
/* Product Section */
Route::prefix('dealers')->group(function () {
    Route::get('/panel', 'Seller\SellerController@index')->name('sellerpanel');//->middleware('seller')
    Route::get('/products/showadd', 'Product\ProductController@showadd')->name('prod.show.add');
    Route::get('/products/edit/{id}', 'Product\ProductController@showedit')->name('prod.show.edit');
    Route::post('/products/create', 'Product\ProductController@createadd')->name('prod.show.create');
    Route::post('/products/update/{id}', 'Product\ProductController@update')->name('prod.update');
    Route::get('/products/delete{id}', 'Product\ProductController@delete')->name('prod.delete');

    Route::get('/products/index', 'Product\ProductController@index')->name('prod.index');

    Route::post('/products/search', 'Product\ProductController@search')->name('prod.show.search');
    Route::get('/products/image/{id}', 'Product\ProductController@imgindex')->name('prod.image.index');
    Route::get('/products/killimages/{id}{prodid}', 'Product\ProductController@killimg')->name('prod.image.delete');
    Route::get('/products/setimages/{id}{prodid}', 'Product\ProductController@setimg')->name('prod.image.set');
    Route::post('/products/image/addition/{id}', 'Product\ProductController@addmore')->name('prod.image.add');

});


Route::prefix('admins')->group(function () {


    Route::get('/', 'DashboardController@index')->name('dashboardindex');
    Route::get('/products/index', 'Product\ProductController@allindex')->name('prod.all.index');
    /*Categories Section*/
    Route::get('/categories/add', 'Categories\CategoriesController@showadd')->name('addcat');
    Route::post('/categories/create', 'Categories\CategoriesController@createadd')->name('createcat');
    Route::get('/categories/index', 'Categories\CategoriesController@index')->name('indexcat');


// Route::get('/categories/details/{id}','Categories\CategoriesController@details')->name('cat.details');
    Route::get('/categories/edit/{id}', 'Categories\CategoriesController@showedit')->name('cat.edit');
    Route::post('/categories/update/{id}', 'Categories\CategoriesController@update')->name('cat.update');
    Route::get('/categories/delete/{id}', 'Categories\CategoriesController@delete')->name('cat.delete');
    Route::post('/products/search', 'DashboardController@search')->name('admin.prod.show.search');

    /* User Management Section */
    Route::get('/account/showadd', 'Account\AccountController@showadd')->name('acc.show.add');
    Route::post('/account/create', 'Account\AccountController@createadd')->name('acc.create.add');

    Route::get('/account/index', 'Account\AccountController@index')->name('acc.index');
    Route::get('/account/delete/{id}', 'Account\AccountController@delete')->name('acc.delete');
    Route::post('/account/update/{id}', 'Account\AccountController@update')->name('acc.update');
    Route::get('/account/edit/{id}', 'Account\AccountController@showedit')->name('acc.edit');
    Route::get('/account/approve', 'Account\AccountController@showapprove')->name('acc.show.approve');

    Route::get('/account/approvem', 'Account\AccountController@showmanage')->name('acc.show.manage');

    Route::get('/account/approve/a{id}', 'Account\AccountController@approved')->name('acc.approved');
    Route::get('/account/approve/r{id}', 'Account\AccountController@rejected')->name('acc.rejected');
    Route::get('/account/approve/d{id}', 'Account\AccountController@rejected')->name('acc.demote');

    Route::get('/account/promote/admin/{id}', 'Account\AccountController@promoteadmin')->name('acc.promote.admin');
    Route::get('/account/promote/seller/{id}', 'Account\AccountController@promoteseller')->name('acc.promote.seller');
});
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

//! disable registration
Auth::routes();
// Auth::routes();
Route::group(['middleware' => ['auth']], function () {

    // ************************************ ADMIN SECTION **********************************************

    Route::prefix('admin')->group(function () {

        //------------ ADMIN SHIPPING SECTION ------------
        Route::get('/shippings', 'ShippingController@index')->name('admin-ship-index');
        Route::get('/shippings/edit/{id}', 'ShippingController@edit')->name('admin-ship-edit');
        Route::PATCH('/shippings/edit/{id}', 'ShippingController@update')->name('admin-ship-update');
        Route::get('/shippings/create', 'ShippingController@create')->name('admin-ship-create');
        Route::post('/shippings/store', 'ShippingController@store')->name('admin-ship-store');
        Route::post('/shippings/delete', 'ShippingController@destroy')->name('admin-ship-delete');

        //------------ ADMIN SHIPPING SECTION ENDS------------


        //------------ ADMIN BILLING SECTION ------------
        Route::get('/billings', 'BillingController@index')->name('admin-bill-index');
        Route::get('/billings/edit/{id}', 'BillingController@edit')->name('admin-bill-edit');
        Route::PATCH('/billings/edit/{id}', 'BillingController@update')->name('admin-bill-update');
        Route::get('/billings/create', 'BillingController@create')->name('admin-bill-create');
        Route::post('/billings/store', 'BillingController@store')->name('admin-bill-store');
        Route::post('/billings/delete', 'BillingController@destroy')->name('admin-bill-delete');

        //------------ ADMIN BILLING SECTION ENDS------------

        //------------ ADMIN PRODUCT SECTION ------------
        Route::get('/products', 'ProductController@index')->name('admin-prod-index');
        Route::get('/products/edit/{id}', 'ProductController@edit')->name('admin-prod-edit');
        Route::PATCH('/products/edit/{id}', 'ProductController@update')->name('admin-prod-update');
        Route::get('/products/create', 'ProductController@create')->name('admin-prod-creat');
        Route::post('/products/store', 'ProductController@store')->name('admin-prod-store');
        Route::post('/products/delete', 'ProductController@destroy')->name('admin-prod-delete');

        Route::get('/products/draft', 'ProductController@draft')->name('admin-prod-draft');
        Route::get('/products/new', 'ProductController@new')->name('admin-prod-new');
        Route::get('/products/available', 'ProductController@available')->name('admin-prod-available');
        Route::get('/products/unavailable', 'ProductController@unavailable')->name('admin-prod-unavailable');

        //------------ ADMIN PRODUCT SECTION ENDS------------

        //------------ ADMIN CATEGORY SECTION ------------

        Route::get('/category', 'CategoryController@index')->name('admin-cat-index');
        Route::get('/category/create', 'CategoryController@create')->name('admin-cat-create');
        Route::post('/category/create', 'CategoryController@store')->name('admin-cat-store');
        Route::get('/category/edit/{id}', 'CategoryController@edit')->name('admin-cat-edit');
        Route::PATCH('/category/edit/{id}', 'CategoryController@update')->name('admin-cat-update');
        Route::post('/category/delete', 'CategoryController@destroy')->name('admin-cat-delete');

        Route::get('/subcategory', 'SubCategoryController@index')->name('admin-subcat-index');
        Route::get('/subcategory/create', 'SubCategoryController@create')->name('admin-subcat-create');
        Route::post('/subcategory/create', 'SubCategoryController@store')->name('admin-subcat-store');
        Route::get('/subcategory/edit/{id}', 'SubCategoryController@edit')->name('admin-subcat-edit');
        Route::PATCH('/subcategory/edit/{id}', 'SubCategoryController@update')->name('admin-subcat-update');
        Route::post('/subcategory/delete', 'SubCategoryController@destroy')->name('admin-subcat-delete');
        Route::get('/load/subcategories/{id}', 'SubCategoryController@load')->name('admin-subcat-load'); //JSON REQUEST

        //------------ ADMIN CATEGORY SECTION ENDS------------

        Route::get('/dashboard', 'HomeController@index')->name('home');

        // ------------ Users Management SECTION----------------------

        Route::get('/users/{type?}', 'UserController@index')->name('users');
        Route::get('/create/user', 'UserController@create')->name('users.create');
        Route::get('/users/{user}', 'UserController@show')->name('users.show');
        Route::post('/users', 'UserController@store')->name('users.store');
        Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
        Route::PATCH('/users/{user}', 'UserController@update')->name('users.update');
        Route::post('/users/delete', 'UserController@destroy')->name('users.destroy');

        Route::post('/users/delete/{id}', 'UserController@delete');

        // ------------ Users Management SECTION ENDS----------------------

        // ------------ ROLE SECTION ----------------------
        Route::resource('/roles', 'RoleController');
        // ------------ ROLE SECTION ENDS ----------------------

    });

// ************************************ ADMIN SECTION ENDS**********************************************

});

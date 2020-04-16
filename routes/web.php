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
Auth::routes(['register' => false, 'reset' => false]);
// Auth::routes();
Route::group(['middleware' => ['auth']], function () {

    // ************************************ ADMIN SECTION **********************************************

    Route::prefix('admin')->group(function () {


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
        Route::post('/subcategory/edit/{id}', 'SubCategoryController@update')->name('admin-subcat-update');
        Route::post('/subcategory/delete', 'SubCategoryController@destroy')->name('admin-subcat-delete');

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

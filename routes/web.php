<?php

use Illuminate\Support\Facades\Route;

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
    return view('landing');
});

Auth::routes();

    // Home routes ...
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

    // Users routes ...
    Route::prefix('users')->group(function () {
        Route::get('list', 'UserController@list')->name('users-list');
        Route::get('add', 'UserController@add')->name('users-add');
        Route::get('update/{id}', 'UserController@update')->name('users-update');
        Route::post('save-user', 'UserController@create')->name('save-user');
        Route::get('delete-user/{id}', 'UserController@delete')->name('delete-user');
        Route::post('update-user', 'UserController@edit')->name('update-user');
    });

    // Categories routes ...
    Route::prefix('categories')->group(function () {
        Route::get('list', 'CategoryController@list')->name('categories-list');
        Route::get('add', 'CategoryController@add')->name('categories-add');
        Route::get('update/{id}', 'CategoryController@update')->name('categories-update');
        Route::post('save-category', 'CategoryController@create')->name('save-category');
        Route::get('delete-category/{id}', 'CategoryController@delete')->name('delete-category');
        Route::post('update-category', 'CategoryController@edit')->name('update-category');
    });

    // Classifications routes ...
    Route::prefix('classifications')->group(function () {
        Route::get('list', 'ClassificationController@list')->name('classifications-list');
        Route::get('add', 'ClassificationController@add')->name('classifications-add');
        Route::get('update/{id}', 'ClassificationController@update')->name('classifications-update');
        Route::post('save-classification', 'ClassificationController@create')->name('save-classification');
        Route::get('delete-classification/{id}', 'ClassificationController@delete')->name('delete-classification');
        Route::post('update-classification', 'ClassificationController@edit')->name('update-classification');
    });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

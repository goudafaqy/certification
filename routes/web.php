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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

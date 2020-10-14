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

Route::get('/login', function () {
    if( session()->has('user')){
        return redirect('/');
    }
    return view('auth.login');
});

Route::get('/admin_login', function () {
    if( session()->has('user')){
        return redirect('/');
    }
    return view('auth.login2');
});

Route::post('DologinAdmin', 'UserController@admin_login')->name('DologinAdmin');
Route::post('Dologin', 'UserController@login')->name('Dologin');
Route::get('logout_admin', 'UserController@logoutAdmin')->name('logout_admin');
Route::get('logout', 'UserController@logout')->name('logoutC');

Route::get('verificationForm', 'UserController@verificationForm')->name('verificationForm');
Route::post('verification', 'UserController@verification')->name('verification');
Route::get('export', 'MainController@export')->name('export');
Route::get('importExportView', 'MainController@importExportView')->name('importExportView');
Route::post('import', 'MainController@import')->name('import');
Route::get('generate', 'MainController@generate');
Route::get('/', 'MainController@index');
Route::get('/download/{course}', 'MainController@download')->name('download');
Route::get('/print/{national_id}/{course}', 'MainController@print')->name('print');
Route::get('/view/{national_id}/{course}', 'MainController@view')->name('view');
Route::get('/mail', 'MainController@mail')->name('mail');
Route::get('pdf','MainController@createPDF');

Auth::routes();
Route::get('/verification/{national_id}/{course}', 'MainController@verification')->name('verificationCertificate');

// Users routes ...
Route::prefix('users')->group(function () {

    Route::get('list', 'UserController@list')->name('users-list');
    Route::get('add', 'UserController@add')->name('users-add');
    Route::get('update/{id}', 'UserController@update')->name('users-update');
    Route::post('save', 'UserController@create')->name('save-user');
    Route::get('delete/{id}', 'UserController@delete')->name('delete-user');
    Route::post('update', 'UserController@edit')->name('update-user');
    Route::get('password', 'UserController@password')->name('password');
    Route::post('change', 'UserController@changePassword')->name('changePassword');

});

// Users routes ...
Route::prefix('courses')->group(function () {

    Route::get('/', 'MainController@list')->name('courses-list');
    Route::get('add', 'MainController@add')->name('courses-add');
    Route::get('update/{id}', 'MainController@update')->name('courses-update');
    Route::post('save', 'MainController@create')->name('save-course');
    Route::get('delete/{id}', 'MainController@delete')->name('delete-course');
    Route::post('update', 'MainController@edit')->name('update-course');
});


// trainees routes ...
Route::prefix('trainees')->group(function () {

    Route::get('/{course}', 'TraineeController@list')->name('trainees-list');
    Route::get('add/{course}', 'TraineeController@add')->name('trainees-add');
    Route::get('update/{id}', 'TraineeController@update')->name('trainees-update');
    Route::post('save', 'TraineeController@create')->name('save-trainees');
    Route::get('delete/{id}/{course}', 'TraineeController@delete')->name('delete-trainees');
    Route::post('update', 'TraineeController@edit')->name('update-trainees');
});

Route::get('/home', 'HomeController@index')->name('home');

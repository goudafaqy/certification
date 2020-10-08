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

// Route::get('/', function () {

//     if( empty(session()->has('user'))){
//         return redirect('/login');
//     }
//     return view('home');
// });


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
Route::get('logout', 'UserController@logout')->name('logout');
Route::get('verificationForm', 'UserController@verificationForm')->name('verificationForm');
Route::post('verification', 'UserController@verification')->name('verification');
Route::get('export', 'MainController@export')->name('export');
Route::get('importExportView', 'MainController@importExportView');
Route::post('import', 'MainController@import')->name('import');
Route::get('generate', 'MainController@generate');
Route::get('/', 'MainController@index');
Route::get('/download/{course}', 'MainController@download')->name('download');
<<<<<<< HEAD
Route::get('/print/{national_id}/{course}', 'MainController@print')->name('print');
Route::get('/view/{national_id}/{course}', 'MainController@view')->name('view');
=======
Route::get('/mail', 'MainController@mail')->name('mail');
Route::get('pdf','MainController@createPDF');
>>>>>>> e431079f48dd82aef2085019070461ca200d0b07

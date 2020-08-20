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

Route::get('/','WelcomeController@index');
Route::get('/{by}/{by_id}/courses','WelcomeController@courses');
Route::get('/course/{id}','WelcomeController@course');
Route::get('/profile/{id}','WelcomeController@instructorProfile');
Route::post('/purchase','PurchaseController@purchase')->name('purchase-course');

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

    // Courses routes ...
    Route::prefix('courses')->group(function () {
        Route::get('list', 'CourseController@list')->name('courses-list');
        Route::get('add', 'CourseController@add')->name('courses-add');
        Route::get('update/{id}', 'CourseController@update')->name('courses-update');
        Route::post('save-course', 'CourseController@create')->name('save-course');
        Route::get('delete-course/{id}', 'CourseController@delete')->name('delete-course');
        Route::post('update-course', 'CourseController@edit')->name('update-course');
        Route::get('class-by-cat', 'CourseController@getClassByCatId')->name('class-by-cat');
    });

    // Course Appointments routes ...
    Route::prefix('courses')->group(function () {
        Route::get('appointments/{course_id}', 'CourseAppointmentController@list')->name('appointments-list');
        Route::post('appointments/generate', 'CourseAppointmentController@generate')->name('generate-appointment');
        Route::get('appointments/delete/{id}', 'CourseAppointmentController@delete')->name('delete-appointment');
        Route::get('appointments/reset/{id}', 'CourseAppointmentController@reset')->name('reset-appointment');
    });

    // Course Materials routes ...
    Route::prefix('materials')->group(function () {
        Route::get('{course_id}', 'CourseMaterialsController@list')->name('materials-list');
        Route::get('add/{course_id}', 'CourseMaterialsController@add')->name('materials-add');
        Route::get('update/{id}/{course_id}', 'CourseMaterialsController@update')->name('materials-update');
        Route::post('update', 'CourseMaterialsController@edit')->name('update-materials');
        Route::post('save', 'CourseMaterialsController@create')->name('save-materials');
        Route::get('delete/{id}/{course_id}', 'CourseMaterialsController@delete')->name('delete-materials');
    });

    // Course Sections routes ...
     Route::prefix('sections')->group(function () {

        Route::get('{course_id}', 'CourseSectionsController@list')->name('sections-list');
        Route::get('add/{course_id}', 'CourseSectionsController@add')->name('sections-add');
        Route::get('update/{id}/{course_id}', 'CourseSectionsController@update')->name('sections-update');
        Route::post('update', 'CourseSectionsController@edit')->name('update-sections');
        Route::post('save', 'CourseSectionsController@create')->name('save-sections');
        Route::get('delete/{id}/{course_id}', 'CourseSectionsController@delete')->name('delete-sections');
    });

    // Course Units routes ...
    Route::prefix('units')->group(function () {

        Route::get('{section_id}', 'CourseUnitsController@list')->name('units-list');
        Route::get('add/{section_id}', 'CourseUnitsController@add')->name('units-add');
        Route::get('update/{id}/{section_id}', 'CourseUnitsController@update')->name('units-update');
        Route::post('update', 'CourseUnitsController@edit')->name('update-units');
        Route::post('save', 'CourseUnitsController@create')->name('save-units');
        Route::get('delete/{id}/{section_id}', 'CourseUnitsController@delete')->name('delete-units');
    });

    // Zoom routes ...
    Route::prefix('zoom')->group(function () {

        Route::get('create-webinar', 'ZoomController@create')->name('create-webinar');
        Route::post('store-webinar', 'ZoomController@store')->name('store-webinar');
        Route::get('webinars-list', 'ZoomController@index')->name('webinars-list');
    });


    Route::get('test', function (){
        return view('site.course');
    });

    // Course Units routes ...
    Route::prefix('notifications')->group(function () {

        Route::get('/', 'NotificationsSettingsController@list')->name('notify-list');
        Route::get('add', 'NotificationsSettingsController@add')->name('notify-add');
        Route::get('update/{id}', 'NotificationsSettingsController@update')->name('notify-update');
        Route::post('update', 'NotificationsSettingsController@edit')->name('update-notify');
        Route::post('save', 'NotificationsSettingsController@create')->name('save-notify');
        Route::get('delete/{id}', 'NotificationsSettingsController@delete')->name('delete-notify');

    });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('instructor')->group(function (){
    Route::prefix('courses')->namespace('instructor')->group(function () {
        Route::get('{type}/list', 'CourseController@list')->name('instructor-courses-list');
        Route::get('view/{id}/{tab?}', 'CourseController@view')->name('instructor-courses-view');

        Route::get('view/{id}/exam/add', 'CourseExamsController@add')->name('instructor-course-exam-add');
        Route::get('view/{id}/assignment/add', 'CourseExamsController@add')->name('instructor-course-assignment-add');
        Route::post('view/{id}/exam/save', 'CourseExamsController@create')->name('instructor-course-exam-create');
        Route::get('view/{id}/exams/questions', 'CourseExamsController@questions')->name('instructor-course-exam-questions');
        Route::get('view/{id}/exams/questions/add', 'CourseExamsController@question_add')->name('instructor-course-exam-question-create');
        Route::post('view/{id}/exams/questions/save', 'CourseExamsController@question_create')->name('instructor-course-exam-question-create');


    });
});

<?php

use Carbon\Carbon;
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

Route::get('/', 'WelcomeController@index');
Route::get('/{by}/{by_id}/courses', 'WelcomeController@courses');
Route::get('/course/{id}', 'WelcomeController@course');
Route::get('/profile/{id}', 'WelcomeController@instructorProfile');
Route::post('/purchase', 'PurchaseController@purchase')->name('purchase-course');
Route::get('/courses', 'WelcomeController@searchResults')->name('courses');
Route::view('forgot', 'auth.forgot');

Route::get('/reset/{token}', 'Auth\ResetPasswordController@getSendResetLink');
Route::post('/send-reset-password-email', 'Auth\ResetPasswordController@sendResetLink')->name('send_password_link');

Route::get('/reset-password', 'Auth\ResetPasswordController@getResetPasswordPage');
Route::post('/reset-password', 'Auth\ResetPasswordController@resetPassword')->name('reset-password');


Auth::routes();

// Home routes ...
Route::prefix('dashboard')->group(function () {
    Route::get('/', 'HomeController@dashboard')->name('dashboard');
    Route::get('/trainee', 'HomeController@traineeDashboard');
    Route::get('/instructor', 'HomeController@instructorDashboard');
    Route::get('/admin', 'HomeController@adminDashboard');
    Route::get('/support', 'HomeController@supportDashboard');

    Route::get('edit-profile', 'ProfileController@edit')->name('edit-profile');
    Route::post('save-profile', 'ProfileController@save')->name('save-profile');
    Route::post('save-qualifications', 'ProfileController@saveQualifications')->name('save-qualifications');
});


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
        Route::get('view/{id}', 'CourseController@view')->name('course-view');
        Route::post('duplicate', 'CourseController@duplicate')->name('courses-duplicate');
        Route::post('save-course', 'CourseController@create')->name('save-course');
        Route::get('delete-course/{id}', 'CourseController@delete')->name('delete-course');
        Route::post('update-course', 'CourseController@edit')->name('update-course');
        Route::get('class-by-cat', 'CourseController@getClassByCatId')->name('class-by-cat');
    });

// Course Appointments routes ...
Route::prefix('courses')->group(function () {
    Route::get('appointments/{course_id}', 'CourseAppointmentController@list')->name('appointments-list');
    Route::post('appointments/generate', 'CourseAppointmentController@generate')->name('generate-appointment');
    Route::post('appointments/validateTime', 'CourseAppointmentController@validateTime')->name('validate-appointment');
    Route::get('appointments/delete/{id}', 'CourseAppointmentController@delete')->name('delete-appointment');
    Route::get('appointments/reset/{id}', 'CourseAppointmentController@reset')->name('reset-appointment');
    Route::post('appointments/zoom', 'CourseAppointmentController@scheduleOnZoom')->name('scheduleOnZoom-appointment');
    Route::get('appointments/schedulezoom/generate', 'CourseAppointmentController@schedulingZoomAppointments')->name('scheduleOnZoom-appointment-cron');
});

      // Course Appointments routes ...
      Route::prefix('courses')->group(function () {
        Route::get('ratings/{course_id}', 'CourseRatingController@list')->name('ratings-list');
        Route::post('ratings/rate', 'CourseRatingController@rate')->name('rate_course');
        Route::post('ratings/aprove_bulk', 'CourseRatingController@approve_bulk')->name('approve-bulk');
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


Route::get('test', function () {

    dd(\Carbon\Carbon::createFromTimeString('2020-08-01 00:00:00'));
});

// Course notifications routes ...
Route::prefix('notifications')->group(function () {

    Route::get('/', 'NotificationsSettingsController@list')->name('notify-list');
    Route::get('add', 'NotificationsSettingsController@add')->name('notify-add');
    Route::get('update/{id}', 'NotificationsSettingsController@update')->name('notify-update');
    Route::post('update', 'NotificationsSettingsController@edit')->name('update-notify');
    Route::post('save', 'NotificationsSettingsController@create')->name('save-notify');
    Route::get('delete/{id}', 'NotificationsSettingsController@delete')->name('delete-notify');

});


// Course advertisments routes ...
Route::prefix('advertisments')->group(function () {

    Route::get('/', 'AdvertismentsController@list')->name('advertisments-list');
    Route::get('add', 'AdvertismentsController@add')->name('advertisments-add');
    Route::get('update/{id}', 'AdvertismentsController@update')->name('advertisments-update');
    Route::post('update', 'AdvertismentsController@edit')->name('update-advertisments');
    Route::post('save', 'AdvertismentsController@create')->name('save-advertisments');
    Route::get('delete/{id}', 'AdvertismentsController@delete')->name('delete-advertisments');

});


// Course testmonials routes ...
Route::prefix('testmonials')->group(function () {

    Route::get('/', 'TestmonialsController@list')->name('testmonials-list');
    Route::get('add', 'TestmonialsController@add')->name('testmonials-add');
    Route::get('update/{id}', 'TestmonialsController@update')->name('testmonials-update');
    Route::post('update', 'TestmonialsController@edit')->name('update-testmonials');
    Route::post('save', 'TestmonialsController@create')->name('save-testmonials');
    Route::get('delete/{id}', 'TestmonialsController@delete')->name('delete-testmonials');

});


// Courses Questionnaires ...
Route::prefix('questionnaires')->group(function () {
    Route::get('list', 'QuestionnairesController@list')->name('questionnaires-list');
    Route::get('show/{id}', 'QuestionnairesController@show')->name('questionnaires-show');
    Route::get('add', 'QuestionnairesController@add')->name('questionnaires-add');
    Route::post('save', 'QuestionnairesController@create')->name('save-questionnaires');
    Route::get('update/{id}', 'QuestionnairesController@update')->name('questionnaires-update');
    Route::get('delete/{id}', 'QuestionnairesController@delete')->name('delete-questionnaires');
    Route::post('update', 'QuestionnairesController@edit')->name('update-questionnaires');
});

Auth::routes();


// Instructor dashboard routes ...
Route::prefix('instructor')->group(function () {
    Route::prefix('courses')->namespace('Instructor')->group(function () {
        Route::get('{course_id}/getCourseProgress', 'CourseController@getCourseProgress')->name('getCourseProgress');
        Route::get('{course_id}/attendance', 'CourseController@getCourseAttendance')->name('getCourseAttendance');
        Route::get('{course_id}/{Trainee_id}/getTraineCourseAttendance', 'CourseController@getTraineCourseAttendance')->name('getTraineCourseAttendance');

        

        Route::get('webinar/{webinar_id}/attendance', 'AttendanceController@index')->name('attendance'); 
        Route::get('webinar/attend-status/{user_id}', 'AttendanceController@index')->name('attend-status');
        Route::get('session/{session_id}/attendance', 'CourseAppointmentAttendenceController@FaceToFaceindex')->name('attendance_facetoface');
        Route::get('session/{session_id}/bbbattendance', 'CourseAppointmentAttendenceController@BBBAttandence')->name('attendance_bbb');
        Route::get('session/attend-status/{user_id}', 'CourseAppointmentAttendenceController@index')->name('attend-status');
        Route::post('session/StartNewsession', 'CourseAppointmentAttendenceController@StartNewSession')->name('StartNewSession');
        Route::post('session/ExpireAttandSession', 'CourseAppointmentAttendenceController@ExpireAttandSession')->name('ExpireAttandSession');
        Route::post('session/attend_traineesbyInstructor', 'CourseAppointmentAttendenceController@Attend_traineesbyInstructor')->name('attend_traineesbyInstructor');
        Route::get('session/{session_id}/{maxSessionId}/StartBBBSession', 'CourseController@StartBBBSession')->name('StartBBBSession');
        Route::get('session/{session_id}/{maxSessionId}/EndBBBSession', 'CourseController@EndBBBSession')->name('EndBBBSession');
        
        Route::post('appointments/AddNewAppointment', 'CourseController@AddNewAppointment')->name('AddNewAppointment');
        Route::get('appointments/AddNewbbbAppointment', 'CourseController@AddNewbbbAppointment')->name('AddNewbbbAppointment');

        Route::post('saveAjex', 'CourseMaterialsController@createAjax')->name('saveAjax-materials');

        Route::get('{type}/list', 'CourseController@list')->name('instructor-courses-list');
        Route::get('{id}/{tab?}', 'CourseController@view')->name('instructor-courses-view');

        Route::get('{id}/exam/add', 'CourseExamsController@add')->name('instructor-course-exam-add');
        Route::get('{id}/assignment/add', 'CourseExamsController@add')->name('instructor-course-assignment-add');
        Route::post('{id}/exam/save', 'CourseExamsController@create')->name('instructor-course-exam-create');

        Route::get('{id}/exam/{examId}/edit', 'CourseExamsController@edit')->name('instructor-course-exam-edit');
        Route::get('{id}/assignment/{examId}/edit', 'CourseExamsController@edit')->name('instructor-course-assignment-edit');
        Route::post('{id}/exam/{examId}/update', 'CourseExamsController@update')->name('instructor-course-exam-update');

        Route::get('{id}/exam/{examId}/trainees', 'CourseExamsController@trainees')->name('instructor-course-exam-trainees');
        Route::get('{id}/assignment/{examId}/trainees', 'CourseExamsController@trainees')->name('instructor-course-assignment-trainees');
        Route::get('{id}/exam/{examId}/review/{traineeId}', 'CourseExamsController@trainee_answers')->name('instructor-course-exam-review-trainee');
        Route::get('{id}/assignment/{examId}/review/{traineeId}', 'CourseExamsController@trainee_answers')->name('instructor-course-assignment-review-trainee');
        Route::post('{id}/exam/{examId}/review/{traineeId}', 'CourseExamsController@review')->name('instructor-course-exam-review-trainee-save');

        Route::post('{id}/evaluation/term/save', 'CourseEvaluationsController@saveTerm')->name('instructor-evaluation-term-save');
        Route::get('{id}/evaluation/term/delete/{termId}', 'CourseEvaluationsController@deleteTerm')->name('instructor-evaluation-term-delete');
        Route::post('{id}/evaluation/save', 'CourseEvaluationsController@saveEvaluations')->name('instructor-evaluation-trainees-save');

        Route::get('/certificates', 'CertificatesController@certificates')->name('certificates');
        Route::post('/generate_certificates', 'CertificatesController@generate_certificates')->name('generate_certificates');
    
        Route::post('{id}/update/save', 'CourseUpdateController@create')->name('instructor-save-update');
        Route::get('{id}/update/delete', 'CourseUpdateController@delete')->name('instructor-delete-update');


        Route::get('{id}/support/ticket', 'CourseSupportController@form')->name('instructor-course-support-form');
        Route::post('{id}/support/ticket', 'CourseSupportController@saveTicket')->name('instructor-course-support-new-ticket');
        Route::get('{id}/support/ticket/{ticketId}', 'CourseSupportController@show')->name('instructor-course-support-show');
        Route::post('{id}/support/ticket/{ticketId}/comment', 'CourseSupportController@saveComment')->name('instructor-course-support-ticket-comment-save');

        Route::get('{id}/questionnaire/create', 'CourseQuestionnairesController@form')->name('instructor-course-questionnaire-form');
        Route::post('{id}/questionnaire/save', 'CourseQuestionnairesController@save')->name('instructor-course-questionnaire-save');
        Route::get('{id}/questionnaire/{questId}/edit', 'CourseQuestionnairesController@form')->name('instructor-course-questionnaire-edit');
        Route::post('{id}/questionnaire/{questId}/update', 'CourseQuestionnairesController@update')->name('instructor-course-questionnaire-update');
        Route::get('{id}/questionnaire/{questId}/show', 'CourseQuestionnairesController@show')->name('instructor-course-questionnaire-show');
        Route::get('{id}/questionnaire/{questId}', 'CourseQuestionnairesController@delete')->name('instructor-course-questionnaire-delete');
    });
});

Route::get('newsletter', 'WelcomeController@newsletter')->name('newsletter');

// Trainee dashboard routes ...
Route::prefix('trainee')->group(function () {
    Route::prefix('courses')->namespace('Trainee')->group(function () {
        Route::get('{course_id}/getCourseProgress', 'CourseController@getCourseProgress')->name('traineegetCourseProgress');

        Route::get('/list', 'CourseController@list')->name('trainee-courses');
        Route::get('{id}/{tab?}', 'CourseController@view')->name('trainee-courses-view');

        Route::get('{id}/exam/{examId}/show', 'CourseExamsController@start')->name('trainee-course-exam-show');
        Route::post('{id}/exam/{examId}/answer', 'CourseExamsController@submitAnswer')->name('trainee-course-exam-answer');

        Route::get('{id}/support/ticket', 'CourseSupportController@form')->name('trainee-course-support-form');
        Route::post('{id}/support/ticket', 'CourseSupportController@saveTicket')->name('trainee-course-support-new-ticket');
        Route::get('{id}/support/ticket/{ticketId}', 'CourseSupportController@show')->name('trainee-course-support-show');
        Route::post('{id}/support/ticket/{ticketId}/comment', 'CourseSupportController@saveComment')->name('trainee-course-support-ticket-comment-save');
        Route::post('session/AttandSession', 'CourseAppointmentAttendenceController@AttandSession')->name('AttandSession');
        Route::get('session/{session_id}/{maxSessionId}/JoinBBBSession', 'CourseController@JoinBBBSession')->name('JoinBBBSession');


        Route::get('{id}/questionnaire/{questId}', 'CourseController@questionnaire')->name('trainee-course-questionnaire-show');
        Route::post('{id}/questionnaire/{questId}/save', 'CourseController@saveQuestionnaire')->name('trainee-course-questionnaire-save');

    });


});

    Route::get('/certificates', 'CertificatesController@certificates')->name('certificates');
    Route::post('/generate_certificates', 'CertificatesController@generate_certificates')->name('generate_certificates');
    Route::post('/send_email_students', 'CertificatesController@send_email_students')->name('send_email_students');
    Route::get('/readNotifications', 'NotificationsController@read')->name('readNotifications');
    Route::get('/userNotifications', 'NotificationsController@userNotifications')->name('userNotifications');
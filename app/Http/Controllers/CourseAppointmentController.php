<?php

namespace App\Http\Controllers;

use App\Http\Helpers\DateHelper;
use App\Http\Interfaces\Validation\CourseAppointmentValidation;
use App\Http\Repositories\Eloquent\CourseAppointmentRepo;
use App\Http\Repositories\Eloquent\CourseRepo;
use Illuminate\Http\Request;

class CourseAppointmentController extends Controller
{
    var $courseRepo;
    var $userRepo;
    var $categoryRepo;
    var $classRepo;
    var $courseValidation;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CourseRepo $courseRepo, 
        CourseAppointmentRepo $courseAppRepo, 
        CourseAppointmentValidation $courseAppValidation
    )
    {
        $this->courseRepo = $courseRepo;
        $this->courseAppRepo = $courseAppRepo;
        $this->courseAppValidation = $courseAppValidation;
        $this->middleware('auth');
    }

    /**
     * List the Course Appointments ...
     */
    public function list($course_id)
    {
        $appointments = $this->courseRepo->getById($course_id)->appointments;
        return view("appointments.appointments-list", ['appointments' => $appointments]);
    }

}

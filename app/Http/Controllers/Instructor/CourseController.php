<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Helpers\DateHelper;
use App\Http\Repositories\Eloquent\CategoryRepo;
use App\Http\Repositories\Validation\CourseRepoValidation;
use App\Http\Repositories\Eloquent\CourseRepo;
use App\Http\Repositories\Eloquent\UserRepo;
use Illuminate\Http\Request;
use App\Http\Helpers\FileHelper;
use App\Http\Helpers\GenerateHelper;
use App\Http\Repositories\Eloquent\ClassificationRepo;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class CourseController extends Controller
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
        UserRepo $userRepo
    )
    {
        $this->courseRepo = $courseRepo;
        $this->userRepo = $userRepo;
        $this->middleware(['auth', 'authorize.instructor']);
    }

    public function list($type)
    {

        if ($type == 'current') {
            $courses = $this->courseRepo->getCurrentByInstructor(Auth::id());
        } elseif ($type == 'past') {
            $courses = $this->courseRepo->getPastByInstructor(Auth::id());
        } else {
            throw new NotFoundHttpException();
        }

        return view("cp.instructor.courses.list", ['courses' => $courses, 'type' => $type]);
    }


    public function view($id, $tab = 'sessions')
    {

        $course = $this->courseRepo->getById($id);

        if (!method_exists($this, $tab)) {
            throw new NotFoundHttpException();
        }

        return $this->$tab($course);

    }

    private function sessions($course){
        return view("cp.instructor.courses.view", ['course' => $course, 'tab' => 'sessions']);
    }

    private function materials($course){
        return view("cp.instructor.courses.view", ['course' => $course, 'tab' => 'materials']);
    }

    private function books($course){
        return view("cp.instructor.courses.view", ['course' => $course, 'tab' => 'books']);
    }

    private function updates($course){
        return view("cp.instructor.courses.view", ['course' => $course, 'tab' => 'updates']);
    }

    private function exams($course){

        $exams = [];

        return view("cp.instructor.courses.view", ['course' => $course, 'exams' => $exams, 'tab' => 'exams']);
    }

    private function evaluation($course){
        return view("cp.instructor.courses.view", ['course' => $course, 'tab' => 'evaluation']);
    }

    private function trainees($course){
        return view("cp.instructor.courses.view", ['course' => $course, 'tab' => 'trainees']);
    }

}

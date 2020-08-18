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


    public function view($type, $id , $tab = 'sessions')
    {
        $course = $this->courseRepo->getById($id);

        if (!method_exists($this, $tab)) {
            throw new NotFoundHttpException();
        }

        return $this->$tab($course, $type);

    }

    private function sessions($course, $type){
        return view("cp.instructor.courses.view", ['course' => $course, 'type' => $type, 'tab' => 'sessions']);
    }

    private function materials($course, $type){
        return view("cp.instructor.courses.view", ['course' => $course, 'tab' => 'materials', 'type' => $type]);
    }

    private function books($course, $type){
        return view("cp.instructor.courses.view", ['course' => $course, 'tab' => 'books', 'type' => $type]);
    }

    private function updates($course, $type){
        return view("cp.instructor.courses.view", ['course' => $course, 'tab' => 'updates', 'type' => $type]);
    }

    private function exams($course, $type){

        $exams = [];

        return view("cp.instructor.courses.view", ['course' => $course, 'exams' => $exams, 'tab' => 'exams', 'type' => $type]);
    }

    private function evaluation($course, $type){
        return view("cp.instructor.courses.view", ['course' => $course, 'tab' => 'evaluation', 'type' => $type]);
    }

    private function trainees($course, $type){
        return view("cp.instructor.courses.view", ['course' => $course, 'tab' => 'trainees', 'type' => $type]);
    }

}

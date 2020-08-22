<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Eloquent\CourseAppointmentRepo;
use App\Http\Repositories\Eloquent\CourseRepo;
use App\Http\Repositories\Eloquent\MaterialRepo;
use App\Http\Repositories\Eloquent\UserRepo;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CourseController extends Controller
{
    var $courseRepo;
    var $userRepo;
    var $materialRepo;
    var $appointmentRepo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CourseRepo $courseRepo,
        UserRepo $userRepo,
        MaterialRepo $materialRepo,
        CourseAppointmentRepo $appointmentRepo
    )
    {
        $this->courseRepo = $courseRepo;
        $this->userRepo = $userRepo;
        $this->materialRepo = $materialRepo;
        $this->appointmentRepo = $appointmentRepo;
        $this->middleware(['auth', 'authorize.trainee']);
    }

    public function list()
    {
        $trainee_id = Auth::id();
        $courses = $this->userRepo->getTraineeCourses($trainee_id);
        return view("cp.trainee.courses.list", ['courses' => $courses]);
    }


    public function view($id, $tab = 'guide')
    {
        $course = $this->courseRepo->getById($id);

        if (!method_exists($this, $tab)) {
            throw new NotFoundHttpException();
        }

        return $this->$tab($course);
    }

    private function guide($course)
    {
        $guide = $this->materialRepo->getByCourseWhereField($course->id, "type", "guide_t");
        return view("cp.trainee.courses.view", ['course' => $course, 'tab' => 'tab1', 'guide' => $guide]);
    }

    private function files($course)
    {
        $files = $this->materialRepo->getByCourseWhereNotField($course->id, "type", "guide_t");
        return view("cp.trainee.courses.view", ['course' => $course, 'tab' => 'tab2', 'files' => $files]);
    }

    private function sessions($course)
    {
        $sessions = $this->appointmentRepo->getAll($course->id);
        return view("cp.trainee.courses.view", ['course' => $course, 'tab' => 'tab3', 'sessions' => $sessions]);
    }

    private function questionnaires($course)
    {
        return view("cp.trainee.courses.view", ['course' => $course, 'tab' => 'tab4']);
    }

    private function ads($course)
    {
        return view("cp.trainee.courses.view", ['course' => $course, 'tab' => 'tab5']);
    }

    private function exams($course)
    {

        $exams = $this->examRepo->getAll($course->id);

        return view("cp.trainee.courses.view", ['course' => $course, 'exams' => $exams, 'tab' => 'tab6']);
    }

    private function evaluations($course)
    {
        return view("cp.trainee.courses.view", ['course' => $course, 'tab' => 'tab7']);
    }

    private function trainees($course)
    {
        return view("cp.trainee.courses.view", ['course' => $course, 'tab' => 'tab8']);
    }

    private function support($course)
    {
        return view("cp.trainee.courses.view", ['course' => $course, 'tab' => 'tab9']);
    }

}

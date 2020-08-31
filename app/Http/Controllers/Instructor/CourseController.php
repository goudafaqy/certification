<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Helpers\DateHelper;
use App\Http\Repositories\Eloquent\CourseAppointmentRepo;
use App\Http\Repositories\Eloquent\ExamRepo;
use App\Http\Repositories\Eloquent\CourseRepo;
use App\Http\Repositories\Eloquent\CourseUpdateRepo;
use App\Http\Repositories\Eloquent\MaterialRepo;
use App\Http\Repositories\Eloquent\UserRepo;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CourseController extends Controller
{
    var $courseRepo;
    var $userRepo;
    var $examRepo;
    var $materialRepo;
    var $appointmentRepo;
    var $updateRepo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CourseRepo $courseRepo,
        UserRepo $userRepo,
        ExamRepo $examRepo,
        MaterialRepo $materialRepo,
        CourseAppointmentRepo $appointmentRepo,
        CourseUpdateRepo $updateRepo
    )
    {
        $this->courseRepo = $courseRepo;
        $this->userRepo = $userRepo;
        $this->examRepo = $examRepo;
        $this->materialRepo = $materialRepo;
        $this->appointmentRepo = $appointmentRepo;
        $this->updateRepo = $updateRepo;
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


    public function view($id, $tab = 'guide')
    {
        $type = \request('type');
        $course = $this->courseRepo->getById($id);

        if (!method_exists($this, $tab)) {
            throw new NotFoundHttpException();
        }

        return $this->$tab($course, $type);
    }

    private function guide($course, $type)
    {
        $guide = $this->materialRepo->getByCourseWhereField($course->id, "type", "guide_i");
        return view("cp.instructor.courses.view", ['course' => $course, 'tab' => 'tab1', 'type' => $type, 'guide' => $guide]);
    }

    private function files($course, $type)
    {
        $files = $this->materialRepo->getByCourseWhereNotField($course->id, "type", "guide_i");
        return view("cp.instructor.courses.view", ['course' => $course, 'tab' => 'tab2', 'type' => $type, 'files' => $files]);
    }

    private function sessions($course, $type)
    {
        $sessions = $this->appointmentRepo->getAll($course->id);
        $currentDate = DateHelper::getCurrentDate();
        return view("cp.instructor.courses.view", ['course' => $course, 'tab' => 'tab3', 'type' => $type, 'sessions' => $sessions, 'currentDate' => $currentDate]);
    }

    private function questionnaires($course, $type)
    {
        return view("cp.instructor.courses.view", ['course' => $course, 'tab' => 'tab4', 'type' => $type]);
    }

    private function update($course, $type)
    {
        $updates = $this->updateRepo->getAll($course->id);
        return view("cp.instructor.courses.view", ['course' => $course, 'tab' => 'tab5', 'type' => $type, 'updates' => $updates]);
    }

    private function exams($course, $type)
    {

        $exams = $this->examRepo->getAll($course->id);

        return view("cp.instructor.courses.view", ['course' => $course, 'exams' => $exams, 'tab' => 'tab6', 'type' => $type]);
    }

    private function evaluations($course, $type)
    {
        return view("cp.instructor.courses.view", ['course' => $course, 'tab' => 'tab7', 'type' => $type]);
    }

    private function trainees($course, $type)
    {
        $trainees = $this->courseRepo->getAllTrainees($course->id);
        return view("cp.instructor.courses.view", ['course' => $course, 'tab' => 'tab8', 'type' => $type, 'trainees' => $trainees]);
    }

    private function support($course, $type)
    {
        return view("cp.instructor.courses.view", ['course' => $course, 'tab' => 'tab9', 'type' => $type]);
    }

}

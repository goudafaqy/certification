<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use App\Http\Helpers\DateHelper;
use App\Http\Repositories\Eloquent\CourseAppointmentRepo;
use App\Http\Repositories\Eloquent\CourseRepo;
use App\Http\Repositories\Eloquent\CourseUpdateRepo;
use App\Http\Repositories\Eloquent\ExamRepo;
use App\Http\Repositories\Eloquent\MaterialRepo;
use App\Http\Repositories\Eloquent\UserRepo;
use Illuminate\Support\Facades\Auth;
use PanicHD\PanicHD\Models\Ticket;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CourseController extends Controller
{
    var $courseRepo;
    var $userRepo;
    var $materialRepo;
    var $appointmentRepo;
    var $examRepo;
    var $updateRepo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CourseRepo $courseRepo,
        UserRepo $userRepo,
        MaterialRepo $materialRepo,
        CourseAppointmentRepo $appointmentRepo,
        ExamRepo $examRepo,
        CourseUpdateRepo $updateRepo
    )
    {
        $this->courseRepo = $courseRepo;
        $this->userRepo = $userRepo;
        $this->materialRepo = $materialRepo;
        $this->appointmentRepo = $appointmentRepo;
        $this->examRepo = $examRepo;
        $this->updateRepo = $updateRepo;

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
        $currentDate = DateHelper::getCurrentDate();
        return $this->$tab($course, $currentDate);
    }

    private function guide($course, $currentDate)
    {
        $guide = $this->materialRepo->getByCourseWhereField($course->id, "type", "guide_t");
        return view("cp.trainee.courses.view", ['course' => $course, 'currentDate' => $currentDate, 'tab' => 'tab1', 'guide' => $guide]);
    }

    private function files($course, $currentDate)
    {
        $files = $this->materialRepo->getByCourseWhereNotField($course->id, "type", "guide_t");
        return view("cp.trainee.courses.view", ['course' => $course, 'currentDate' => $currentDate,'tab' => 'tab2', 'files' => $files]);
    }

    private function sessions($course, $currentDate)
    {
        $sessions = $this->appointmentRepo->getAll($course->id);
        return view("cp.trainee.courses.view", ['course' => $course, 'currentDate' => $currentDate,'tab' => 'tab3', 'sessions' => $sessions]);
    }

    private function questionnaires($course, $currentDate)
    {
        return view("cp.trainee.courses.view", ['course' => $course, 'currentDate' => $currentDate,'tab' => 'tab4']);
    }

    private function update($course, $currentDate)
    {
        $updates = $this->updateRepo->getAll($course->id);
        return view("cp.trainee.courses.view", ['course' => $course, 'currentDate' => $currentDate,'tab' => 'tab5', 'updates' => $updates]);
    }

    private function exams($course, $currentDate)
    {

        $exams = $this->examRepo->getExamsForTrainee($course->id, Auth::id());

        return view("cp.trainee.courses.view", ['course' => $course, 'currentDate' => $currentDate,'exams' => $exams, 'tab' => 'tab6']);
    }

    private function evaluations($course, $currentDate)
    {
        return view("cp.trainee.courses.view", ['course' => $course, 'currentDate' => $currentDate,'tab' => 'tab7']);
    }

    private function trainees($course, $currentDate)
    {
        return view("cp.trainee.courses.view", ['course' => $course, 'currentDate' => $currentDate,'tab' => 'tab8']);
    }

    private function support($course, $currentDate)
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->get();

        return view("cp.trainee.courses.view", ['course' => $course, 'tickets' => $tickets, 'currentDate' => $currentDate,'tab' => 'tab9']);
    }

}

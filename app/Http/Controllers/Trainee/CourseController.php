<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use App\Http\Helpers\DateHelper;
use App\Http\Repositories\Eloquent\CourseAppointmentRepo;
use App\Http\Repositories\Eloquent\CourseRatingRepo;
use App\Http\Repositories\Eloquent\CourseRepo;
use App\Http\Repositories\Eloquent\CourseUpdateRepo;
use App\Http\Repositories\Eloquent\ExamRepo;
use App\Http\Repositories\Eloquent\MaterialRepo;
use App\Http\Repositories\Eloquent\UserRepo;
use Illuminate\Support\Facades\Auth;
use PanicHD\PanicHD\Models\Ticket;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Models\CourseAppointmentAttendance;

class CourseController extends Controller
{
    var $courseRepo;
    var $userRepo;
    var $materialRepo;
    var $appointmentRepo;
    var $examRepo;
    var $updateRepo;
    var $courseRatingRepo;

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
        CourseUpdateRepo $updateRepo,
        CourseRatingRepo $courseRatingRepo
    )
    {
        $this->courseRepo = $courseRepo;
        $this->userRepo = $userRepo;
        $this->materialRepo = $materialRepo;
        $this->appointmentRepo = $appointmentRepo;
        $this->examRepo = $examRepo;
        $this->updateRepo = $updateRepo;
        $this->courseRatingRepo=$courseRatingRepo;

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
        $trainee_id = Auth::id();
        $courses = $this->userRepo->getTraineeCourses($trainee_id);
        $course = $this->courseRepo->getById($id);

        if(!isset($course))
            throw new NotFoundHttpException(); 

        if(!$courses->contains($course))
         throw new NotFoundHttpException();
        else{
           if (!method_exists($this, $tab)) 
            throw new NotFoundHttpException();
        
            $progress=$this->getCourseProgress($course);
           $currentDate = DateHelper::getCurrentDate();
           return $this->$tab($course, $currentDate,$progress);
         }
    }

    private function guide($course, $currentDate,$progress)
    {
        $guide = $this->materialRepo->getByCourseWhereField($course->id, "type", "guide_t");
        return view("cp.trainee.courses.view", ['course' => $course, 'progress'=>$progress, 'currentDate' => $currentDate, 'tab' => 'tab1', 'guide' => $guide]);
    }

    private function files($course, $currentDate,$progress)
    {
        $files = $this->materialRepo->getByCourseWhereNotField($course->id, "type", "guide_t");
        return view("cp.trainee.courses.view", ['course' => $course, 'progress'=>$progress, 'currentDate' => $currentDate,'tab' => 'tab2', 'files' => $files]);
    }

    private function sessions($course, $currentDate,$progress)
    {
        $sessions = $this->appointmentRepo->getAll($course->id,true);
        $ActiveSession=array();
        foreach($sessions as $key=>$session){
            if($session->date==date('Y-m-d')){
                $Result=CourseAppointmentAttendance::where('appointment_id', $session->id)
                                           ->where('active',true)->where('user_id',Auth::id())->first();
                if(isset($Result))
                   $ActiveSession=$Result;
            break;
            }
        }
        return view("cp.trainee.courses.view", ['course' => $course, 'progress'=>$progress,'ActiveSession'=>$ActiveSession, 'currentDate' => $currentDate,'tab' => 'tab3', 'sessions' => $sessions]);
    }

    private function questionnaires($course, $currentDate,$progress)
    {
        return view("cp.trainee.courses.view", ['course' => $course, 'progress'=>$progress, 'currentDate' => $currentDate,'tab' => 'tab4']);
    }

    private function update($course, $currentDate,$progress)
    {
        $updates = $this->updateRepo->getAll($course->id);
        return view("cp.trainee.courses.view", ['course' => $course,'progress'=>$progress,  'currentDate' => $currentDate,'tab' => 'tab5', 'updates' => $updates]);
    }

    private function exams($course, $currentDate,$progress)
    {

        $exams = $this->examRepo->getExamsForTrainee($course->id, Auth::id());

        return view("cp.trainee.courses.view", ['course' => $course, 'progress'=>$progress, 'currentDate' => $currentDate,'exams' => $exams, 'tab' => 'tab6']);
    }

    private function evaluations($course, $currentDate,$progress)
    {
        return view("cp.trainee.courses.view", ['course' => $course, 'progress'=>$progress, 'currentDate' => $currentDate,'tab' => 'tab7']);
    }

    private function trainees($course, $currentDate,$progress)
    {
        return view("cp.trainee.courses.view", ['course' => $course, 'progress'=>$progress, 'currentDate' => $currentDate,'tab' => 'tab8']);
    }

    private function support($course, $currentDate,$progress)
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->get();
        return view("cp.trainee.courses.view", ['course' => $course ,'progress'=>$progress,'tickets' => $tickets,  'currentDate' => $currentDate,'tab' => 'tab9']);

    }

    public function getCourseProgress($course){
        $sessions = $this->appointmentRepo->getAll($course->id);
        $currentDate = DateHelper::getCurrentDate();
        $countAllSession=count($sessions);
        $countwhateverdone=0;
        $currentDate=explode(" ",$currentDate)[0];
        foreach ($sessions as $key => $session) {
            if(strtotime($session->date)<=strtotime($currentDate))
               $countwhateverdone++;
        }
        if(isset($sessions))
          return $percentage=round($countwhateverdone/$countAllSession,1)*100;
        else 
         return 0;
    }

}

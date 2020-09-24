<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use App\Http\Helpers\DateHelper;
use App\Http\Helpers\BBBHelper;
use App\Http\Repositories\Eloquent\CourseAppointmentRepo;
use App\Http\Repositories\Eloquent\CourseAppointmentAttendanceRepo;
use App\Http\Repositories\Eloquent\CourseRatingRepo;
use App\Http\Repositories\Eloquent\CourseRepo;
use App\Http\Repositories\Eloquent\CourseUpdateRepo;
use App\Http\Repositories\Eloquent\ExamRepo;
use App\Http\Repositories\Eloquent\MaterialRepo;
use App\Http\Repositories\Eloquent\QuestionnaireRepo;
use App\Http\Repositories\Eloquent\UserRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PanicHD\PanicHD\Models\Ticket;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Models\CourseAppointmentAttendance;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{
    var $courseRepo;
    var $userRepo;
    var $materialRepo;
    var $appointmentRepo;
    var $examRepo;
    var $updateRepo;
    var $questionnaireRepo;
    var $courseRatingRepo;
    var $courseAppointmentAttendenceRepo;

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
        QuestionnaireRepo $questionnaireRepo,
        CourseRatingRepo $courseRatingRepo,
        CourseAppointmentAttendanceRepo $courseAppointmentAttendenceRepo
    )
    {
        $this->courseRepo = $courseRepo;
        $this->userRepo = $userRepo;
        $this->materialRepo = $materialRepo;
        $this->appointmentRepo = $appointmentRepo;
        $this->examRepo = $examRepo;
        $this->updateRepo = $updateRepo;
        $this->questionnaireRepo = $questionnaireRepo;
        $this->courseRatingRepo = $courseRatingRepo;
        $this->courseAppointmentAttendenceRepo = $courseAppointmentAttendenceRepo;

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

        if (!isset($course))
            throw new NotFoundHttpException();

        if (!$courses->contains($course))
            throw new NotFoundHttpException();
        
           $currentDate = DateHelper::getCurrentDate();
           return $this->$tab($course, $currentDate);
         }
    }

    private function guide($course, $currentDate)
    {
        $guide = $this->materialRepo->getByCourseWhereField($course->id, "type", "guide_t");
        return view("cp.trainee.courses.view", ['course' => $course,  'currentDate' => $currentDate, 'tab' => 'tab1', 'guide' => $guide]);
    }

    private function files($course, $currentDate)
    {
        $files = $this->materialRepo->getByCourseWhereNotField($course->id, "type", "guide_t");
        return view("cp.trainee.courses.view", ['course' => $course,  'currentDate' => $currentDate,'tab' => 'tab2', 'files' => $files]);
    }

    private function sessions($course, $currentDate)
    {
        $sessions = $this->appointmentRepo->getAll($course->id, true);
        $ActiveSession = array();
        $maxSessionId = 0;
        foreach ($sessions as $key => $session) {
            if ($session->date == date('Y-m-d')) {
                $Result = CourseAppointmentAttendance::where('appointment_id', $session->id)
                    ->where('active', true)->where('user_id', Auth::id())->first();
                $Resultmax = CourseAppointmentAttendance::where('appointment_id', $session->id)->max('SessionID');
                if (isset($Resultmax)) {
                    $ActiveSession = $Result;
                    $maxSessionId = $Resultmax;
                }
                break;
            }
        }
        return view("cp.trainee.courses.view", ['course' => $course, 'maxSessionId'=>$maxSessionId,'ActiveSession'=>$ActiveSession, 'currentDate' => $currentDate,'tab' => 'tab3', 'sessions' => $sessions]);
    }

    private function questionnaires($course, $currentDate)
    {
        return view("cp.trainee.courses.view", ['course' => $course,  'currentDate' => $currentDate,'tab' => 'tab4']);
    }

    private function update($course, $currentDate)
    {
        $updates = $this->updateRepo->getAll($course->id);
        return view("cp.trainee.courses.view", ['course' => $course,  'currentDate' => $currentDate,'tab' => 'tab5', 'updates' => $updates]);
    }

    private function exams($course, $currentDate)
    {

        $exams = $this->examRepo->getExamsForTrainee($course->id, Auth::id());

        return view("cp.trainee.courses.view", ['course' => $course,  'currentDate' => $currentDate,'exams' => $exams, 'tab' => 'tab6']);
    }

    private function support($course, $currentDate, $progress)
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->get();

        return view("cp.trainee.courses.view", ['course' => $course, 'tickets' => $tickets, 'currentDate' => $currentDate, 'tab' => 'tab9']);
    }


    public function questionnaire($course_id, $quest_id)
    {
        $course = $this->courseRepo->getById($course_id);
        if (!$course) throw new NotFoundHttpException();

        $quest = $this->questionnaireRepo->getById($quest_id);
        if (!$quest) throw new NotFoundHttpException();

        $currentDate = DateHelper::getCurrentDate();

        return view("cp.trainee.courses.questionnaire", ['course' => $course, 'currentDate' => $currentDate, 'quest' => $quest]);
    }

    public function saveQuestionnaire(Request $request, $course_id, $quest_id)
    {

        $course = $this->courseRepo->getById($course_id);
        if (!$course) throw new NotFoundHttpException();

        $quest = $this->questionnaireRepo->getById($quest_id);
        if (!$quest) throw new NotFoundHttpException();


        $data = $request->input();
        unset($data['_token']);

        $answered = $this->questionnaireRepo->saveUserAnswers($data, $quest_id);

        if (!$answered) {
            return redirect()->route('trainee-course-questionnaire-show', [
                'id' => $course_id,
                'questId' => $quest_id
            ])->with('invalid', 'خظأ فى حفظ البيانات')->withInput($request->input());
        }

        return redirect()->route('trainee-courses-view', [
            'id' => $course->id,
        ])->with('submit', "شكرا لتعبئة الإستبيان");
    }

    public function getCourseProgress($courseid){
        $sessions = $this->appointmentRepo->getAll($courseid);
        $currentDate = DateHelper::getCurrentDate();
        $countAllSession = count($sessions);
        $countwhateverdone = 0;
        $currentDate = explode(" ", $currentDate)[0];
        foreach ($sessions as $key => $session) {
             if(strtotime($session->date)<=strtotime($currentDate))
               $countwhateverdone++;
        }
        if($countwhateverdone==0)
        return 0;
        if(isset($sessions))
          return $percentage=round(($countwhateverdone/$countAllSession)*100);
        else 
         return 0;
    }



    public function JoinBBBSession($session_id,$SessionId){
        $appointment=$this->appointmentRepo->getById($session_id);
        $course= $this->courseRepo->getById($appointment->course_id);
        $orgSessionId=$SessionId;
        $lastsessionid=($SessionId==0)?1:++$SessionId; 
        $attandenceSession=$this->courseAppointmentAttendenceRepo->getBySessionIDAndUserId($session_id,$lastsessionid,Auth::user()->id);
        $traineeName=Auth::user()->name_ar;
        $traineeID=Auth::user()->id;
        $meeting_id=$course->code.":".$course->id.":".$appointment->id.":".$orgSessionId;
        
        $attandence=array();
        $attandence['attand_time']= date("Y-m-d");	
        $attandence['attand']=1;
     
        if(BBBHelper::IsMeetingRunning($meeting_id)){
            $this->courseAppointmentAttendenceRepo->update($attandence,$attandenceSession->id);
            $MeetingURL=BBBHelper::joinMeeting($meeting_id,$traineeID,$traineeName,"Trainee");
            return Redirect::away($MeetingURL);
        } else
            return redirect()->back()->with('error', 'الجلسة انتهت بالفعل');
    }
}

<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Helpers\BBBHelper;
use App\Http\Helpers\DateHelper;
use App\Http\Helpers\GenerateHelper;
use App\Http\Repositories\Eloquent\CourseAppointmentRepo;
use App\Http\Repositories\Eloquent\CourseAppointmentAttendanceRepo;
use App\Http\Repositories\Eloquent\EvaluationRepo;
use App\Http\Repositories\Eloquent\ExamRepo;
use App\Http\Repositories\Eloquent\CourseRepo;
use App\Http\Repositories\Eloquent\CourseUpdateRepo;
use App\Http\Repositories\Eloquent\MaterialRepo;
use App\Http\Repositories\Eloquent\QuestionnaireRepo;
use App\Http\Repositories\Eloquent\UserRepo;
use Illuminate\Support\Facades\Auth;
use PanicHD\PanicHD\Models\Ticket;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Models\CourseAppointmentAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class CourseController extends Controller
{
    var $courseRepo;
    var $userRepo;
    var $examRepo;
    var $materialRepo;
    var $appointmentRepo;
    var $updateRepo;
    var $evaluationRepo;
    var $questionnaireRepo;
    var $courseAppointmentAttendenceRepo;

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
        CourseUpdateRepo $updateRepo,
        QuestionnaireRepo $questionnaireRepo,
        EvaluationRepo $evaluationRepo,
        CourseAppointmentAttendanceRepo $courseAppointmentAttendenceRepo
    )
    {
        $this->courseRepo = $courseRepo;
        $this->userRepo = $userRepo;
        $this->examRepo = $examRepo;
        $this->materialRepo = $materialRepo;
        $this->appointmentRepo = $appointmentRepo;
        $this->courseAppointmentAttendenceRepo = $courseAppointmentAttendenceRepo;
        $this->updateRepo = $updateRepo;
        $this->evaluationRepo = $evaluationRepo;
        $this->questionnaireRepo = $questionnaireRepo;
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
        if (!isset($course))
            throw new NotFoundHttpException();
        if ($course->instructor_id != Auth::id())
            throw new NotFoundHttpException();
        if ($type == 'current') {
            $courses = $this->courseRepo->getCurrentByInstructor(Auth::id());
        } elseif ($type == 'past') {
            $courses = $this->courseRepo->getPastByInstructor(Auth::id());
        }


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
        $types = [
            'book' => 'كتاب',
            'extra' => 'مصادر إضافية',
            'img' => 'صورة',
        ];
        $files = $this->materialRepo->getByCourseWhereNotField($course->id, "type", "guide_i");
        return view("cp.instructor.courses.view", ['course' => $course, 'types' => $types, 'tab' => 'tab2', 'type' => $type, 'files' => $files]);
    }

    private function sessions($course, $type)
    {
        $sessions = $this->appointmentRepo->getAll($course->id, true);
        $currentDate = DateHelper::getCurrentDate();
        $maxSessionId = 0;
        foreach ($sessions as $key => $session) {
            if ($session->date == date('Y-m-d')) {
                $Result = CourseAppointmentAttendance::where('appointment_id', $session->id)->max('SessionID');
                if (isset($Result))
                    $maxSessionId = $Result;
                break;
            }
        }
        return view("cp.instructor.courses.view", ['course' => $course, 'maxSessionId' => $maxSessionId, 'tab' => 'tab3', 'type' => $type, 'sessions' => $sessions, 'currentDate' => $currentDate]);
    }

    private function questionnaires($course, $type)
    {
        $questionnaires = $this->questionnaireRepo->getBy('type', 'instructor');
        return view("cp.instructor.courses.view", ['course' => $course, 'tab' => 'tab4', 'type' => $type, 'questionnaires' => $questionnaires]);
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
        $exams = $this->examRepo->getAll($course->id);
        $evaluations = $this->evaluationRepo->getByCourse($course->id);
        $total = $this->evaluationRepo->getEvaluationTotalScore($exams, $evaluations);
        $passing = $course->getPassingScoreByFullScore($total);

        $trainees = $this->evaluationRepo->getTraineesScores($this->courseRepo->getAllTrainees($course->id),
            $exams, $evaluations);

        return view("cp.instructor.courses.view", [
            'course' => $course,
            'tab' => 'tab7', 'type' => $type,
            'exams' => $exams, 'evaluations' => $evaluations,
            'totalScore' => $total, 'passingScore' => $passing,
            'trainees' => $trainees
        ]);
    }

    private function trainees($course, $type)
    {
        $trainees = $this->courseRepo->getAllTrainees($course->id);
        return view("cp.instructor.courses.view", ['course' => $course, 'tab' => 'tab8', 'type' => $type, 'trainees' => $trainees]);
    }

    private function support($course, $type)
    {

        $tickets = Ticket::where('user_id', Auth::user()->id)->get();

        return view("cp.instructor.courses.view", ['course' => $course, 'tickets' => $tickets, 'tab' => 'tab9', 'type' => $type]);
    }


    public function getCourseProgress($courseid)
    {
        $sessions = $this->appointmentRepo->getAll($courseid);
        $currentDate = DateHelper::getCurrentDate();
        $countAllSession = count($sessions);
        $countwhateverdone = 0;
        $currentDate = explode(" ", $currentDate)[0];
        foreach ($sessions as $key => $session) {
            if (strtotime($session->date) <= strtotime($currentDate))
                $countwhateverdone++;
        }
        if ($countwhateverdone == 0)
            return 0;
        if (isset($sessions))
            return $percentage = round(($countwhateverdone / $countAllSession) * 100);
        else
            return 0;
    }

    public function AddNewAppointment(Request $request)
    {
        $inputs = $request->input();
        $row = array();
        $row['title'] = $inputs['course_title'];
        $row['date'] = $inputs['date'];
        $row['day'] = DateHelper::getDayWeekStringFromNumber(date('w', strtotime($inputs['date'])));
        $row['from_time'] = $inputs['from_time'];
        $row['to_time'] = $inputs['to_time'];
        $row['course_id'] = $inputs['course_id'];
        $row['hasZoom'] = $inputs['hasZoom'];
        //is this date already exist
        $isExist = $this->appointmentRepo->IsDateInCourse($row['course_id'], $row['date']);
        if ($isExist)
            return "3";

        $new_startTime = date("H:i:s", strtotime($row['from_time']));
        $new_endTime = date("H:i:s", strtotime($row['to_time']));
        $st_time = strtotime($new_startTime);
        $end_time = strtotime($new_endTime);
        if (($st_time < $end_time) && ($end_time > $st_time)) {
            $this->appointmentRepo->save($row);
            $request->session()->flash('success', 'تم الاضافة بنجاح');
            return "1";
        } else
            return "2";
    }

    public function EndBBBSession($session_id, $SessionId)
    {
        $appointment = $this->appointmentRepo->getById($session_id);
        $course = $this->courseRepo->getById($appointment->course_id);
        $InstructorName = $course->instructor->name_ar;
        $InstructorId = $course->instructor->id;
        $meeting_id = $course->code . ":" . $course->id . ":" . $appointment->id . ":" . $SessionId;
        if (BBBHelper::closeMeeting($meeting_id))
            return redirect()->back()->with('success', 'تم أنهاء الجلسة بنجاح');
        else
            return redirect()->back()->with('error', 'لا يمكن انهاء الجلسة');
    }

    public function StartBBBSession($session_id, $SessionId)
    {
        $appointment = $this->appointmentRepo->getById($session_id);
        $course = $this->courseRepo->getById($appointment->course_id);
        $InstructorName = $course->instructor->name_ar;
        $InstructorId = $course->instructor->id;
        $meeting_id = $course->code . ":" . $course->id . ":" . $appointment->id . ":" . $SessionId;
        if (!BBBHelper::IsMeetingRunning($meeting_id)) {
            $this->StartNewBBBAttandenceSession($session_id, $SessionId);
            $MeetingURL = BBBHelper::StartMeeting($meeting_id, $InstructorId, $InstructorName, "Trainer");
            return Redirect::away($MeetingURL);
        } else {
            $MeetingURL = BBBHelper::joinMeeting($meeting_id, $InstructorId, $InstructorName, "Trainer");
            return Redirect::away($MeetingURL);
        }
    }

    public function StartNewBBBAttandenceSession($appointment_id, $SessionId)
    {
        $appointment = $this->appointmentRepo->getById($appointment_id);
        $course_id = $appointment->course_id;
        $students = $this->courseRepo->getAllTrainees($course_id);
        $SessionCode = rand(10000, 10000000);
        $Insertdata = array();
        $StartattandanceTime = date('Y-m-d H:i:s');
        foreach ($students as $day => $student) {
            $row = [];
            $row['appointment_id'] = $appointment_id;
            $row['user_id'] = $student->id;
            $row['SessionID'] = $SessionId + 1;
            $row['SessionCode'] = $SessionCode;
            $row['duration'] = 1;
            $row['StartattandanceTime'] = $StartattandanceTime;
            $Insertdata[] = $row;
        }
        return $this->courseAppointmentAttendenceRepo->saveBulk($Insertdata);
    }


}

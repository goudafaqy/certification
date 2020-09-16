<?php

namespace App\Http\Controllers;

use App\Http\Helpers\DateHelper;
use App\Http\Repositories\Eloquent\WebinarRepo;
use App\Http\Repositories\Validation\CourseAppointmentRepoValidation;
use App\Http\Repositories\Eloquent\CourseAppointmentRepo;
use App\Http\Repositories\Eloquent\CourseRepo;
use App\Http\Repositories\Validation\WebinarRepoValidation;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CourseAppointmentController extends Controller
{
    var $courseRepo;
    var $userRepo;
    var $categoryRepo;
    var $classRepo;
    var $courseValidation;
    var $webinarRepo;
    var $webinarValidation;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CourseRepo $courseRepo,
        CourseAppointmentRepo $courseAppRepo,
        CourseAppointmentRepoValidation $courseAppValidation,
        WebinarRepo $webinarRepo,
        WebinarRepoValidation $webinarValidation
    )
    {
        $this->webinarRepo       = $webinarRepo;
        $this->webinarValidation = $webinarValidation;
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
        $course         = $this->courseRepo->getById($course_id);
        $appointments   = $course->appointments;
        return view("cp.appointments.appointments-list", ['course' => $course, 'appointments' => $appointments]);
    }


    /**
     * Generate Actual Appointments ...
     */
    public function generate(Request $request)
    {
        $inputs = $request->input();
        $numOfRepeats = $inputs['num_of_repeat'];
        $startDateWeek = date('w', strtotime($inputs['start_date']));
        $lastWeekDay = DateHelper::getLastWeekDay($startDateWeek, $inputs['week_days']);
        $endDate = DateHelper::getEndDate($inputs['start_date'], $numOfRepeats, $lastWeekDay);
        $daysArr = $inputs['week_days'];
        $actualDates = DateHelper::getActualDates($daysArr, $inputs['start_date'], $endDate);

        $from_time = $inputs['from_time'];
        $to_time = $inputs['to_time'];
        $num_of_repeat = $numOfRepeats;
        $lecDuration = DateHelper::getDiffTime($from_time, $to_time);
        $data = [];
        $lec_num = 0;
        $course_days = 0;

        foreach ($actualDates as $day => $dates) {
            $row = [];
            for ($i=0; $i < count($dates); $i++) {
                $row['title']       = $inputs['title'];
                $row['date']        = $dates[$i];
                $row['day']         = DateHelper::getDayWeekStringFromNumber($day);
                $row['from_time']   = $inputs['from_time'];
                $row['to_time']     = $inputs['to_time'];
                $row['course_id']   = $inputs['course_id'];
                $data[] = $row;
                $lec_num++;
                $course_days++;
            }
        }
        $course_hours = $lecDuration * $lec_num;
        $endDateArr = explode("-", $endDate);
        $endDateStr = $endDateArr[1]."/".$endDateArr[2]."/".$endDateArr[0];
        $dataCourse = [
            'from_time'       => $inputs['from_time'],
            'to_time'         => $inputs['to_time'],
            'lec_num'         => $lec_num,
            'course_hours'    => $course_hours,
            'course_days'     => $course_days,
            'start_date'      => DateHelper::getDateFormate($inputs['start_date']),
            'end_date'        => DateHelper::getDateFormate($endDateStr),
            'num_of_repeat'   => $num_of_repeat,
        ];
        $this->courseRepo->update($dataCourse, $inputs['course_id']);

        return ($this->courseAppRepo->saveBulk($data)) ? true : false ;
    }

    /**
     * Delete appointment ...
     */
    public function reset($course_id)
    {
        $dataCourse = [
            'from_time'       => null,
            'to_time'         => null,
            'lec_num'         => 0,
            'course_hours'    => 0,
            'course_days'     => 0,
            'start_date'      => null,
            'end_date'        => null,
            'num_of_repeat'   => 0,
        ];
        $this->courseRepo->update($dataCourse, $course_id);
        $result = $this->courseAppRepo->deleteByCourseId($course_id);
        if($result){
            return redirect('courses/appointments/'.$course_id)->with('deleted', 'تم حذف الموعد بنجاح');
        }
    }

    /**
     *
     */
    public function scheduleOnZoom(Request $request){
        $inputs = $request->input();
        $course_id = $inputs['course_id'];
        $selected_appointments_id = $inputs['id'];
        $this->courseAppRepo->updateBulk(array('hasZoom'=>true),$selected_appointments_id);

        $dataCourse = [ 'zoom'  => 1,];
        $course = Course::find($course_id);
        $this->courseRepo->update($dataCourse, $course_id);
        return redirect()->back();
    }

    /**
     * Delete appointment ...
     */
    public function delete($id)
    {
        $appointment = $this->courseAppRepo->getById($id);
        $course_id = $appointment->course_id;
        $result = $appointment->delete($id);
        if($result){
            return redirect('courses/appointments/'.$course_id)->with('deleted', 'تم حذف الموعد بنجاح');
        }
    }

    public function schedulingZoomAppointments(){

        $appointments = $this->courseAppRepo->getBy("hasZoom",true);
        print("=====Begin=====");
        foreach ($appointments as $appointment) {
            $course = Course::find($appointment->course_id);
            //print_r("<pre>".$course."</pre>");
            $startDateTime = Carbon::createFromTimeString($appointment->date . ' ' . $appointment->from_time)->format('Y-m-d H:i:s');
            $start = Carbon::parse($appointment->from_time);
            $end = Carbon::parse($appointment->to_time);
            $data = [
                'course_appointments_id'=>$appointment->id,
                'course_id'=>$course->id,
                "topic" => $appointment->title,
                "type" => 5,
                "start_time" => $startDateTime,
                "duration" => $end->diffInRealMinutes($start),
                "timezone" => "Asia/Riyadh",
                "agenda" => substr($course->title_ar, 0, 50),
                "students"=>$course->students,
            ];
            
            $this->webinarRepo->save($data);
            $this->courseAppRepo->update(array("hasZoom"=>2), $appointment->id);
        }
        print("=====End=====");
        
    }

    public static function isSessionStillValid($session_date,$session_from,$session_to){
        $startH=(int)explode(":", explode(" ", $session_from)[0])[0];
        $startM=explode(":", explode(" ", $session_from)[0])[1]; 
        $endH=(int)explode(":", explode(" ", $session_to)[0])[0];
        $endM=explode(":", explode(" ", $session_to)[0])[1]; 
        $startAMPM=explode(" ", $session_from)[1];
        $endAMPM=explode(" ", $session_to)[1];

        if(($startAMPM=="PM")&&($startH!=12))
           $startH=$startH+12;
        if(($endAMPM=="PM")&&($endH!=12))
           $endH=$endH+12;
        
        $st_time=strtotime($startH.$startM."00");
        $end_time=strtotime($endH.$endM."00");

        $cur_time   =   strtotime((int) date('Gis'));
        //dd(array("start_time"=>$st_time,"end_time"=>$end_time,"now"=>$cur_time,"session_date"=>$session_date,"nowdate"=>date("Y-m-d")));
        return (
            ($st_time < $cur_time && $end_time >= $cur_time)&&
            (date("Y-m-d") == $session_date) 
              );
    }
}

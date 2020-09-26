<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Helpers\DateHelper; 
use App\Http\Helpers\BBBHelper;
use App\Http\Repositories\Validation\CourseAppointmentRepoValidation;
use App\Http\Repositories\Eloquent\CourseAppointmentRepo;
use App\Http\Repositories\Eloquent\CourseAppointmentAttendanceRepo;
use App\Http\Repositories\Eloquent\CourseAppointmentAttendanceRepoValidation;
use App\Http\Repositories\Eloquent\CourseRepo;
use App\Http\Repositories\Eloquent\UserRepo;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseAppointmentAttendenceController extends Controller
{
    var $courseAppRepo;
    var $userRepo;
    var $courseAppointmentAttendenceRepo;
    var $courseRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        UserRepo $userRepo,
        CourseRepo $courseRepo,
        CourseAppointmentRepo $courseAppRepo,
        CourseAppointmentAttendanceRepo $courseAppointmentAttendenceRepo
    )
    {
        $this->courseRepo = $courseRepo;
        $this->userRepo = $userRepo;
        $this->courseAppRepo = $courseAppRepo;
        $this->courseAppointmentAttendenceRepo = $courseAppointmentAttendenceRepo;
        $this->middleware(['auth', 'authorize.instructor']);
    }

    public function FaceToFaceindex($appointment_id){
        $appointments=$this->courseAppointmentAttendenceRepo->getAll($appointment_id);
        $appDetails=$this->courseAppRepo->getById($appointment_id);
        $details=array("Appointment_date"=>$appDetails->date,"Course_title"=>$appDetails->course->title,
                       "Course_id"=>$appDetails->course);
        $attendances=array();
        $isSessionFinished=$this->isSessionFinished($appDetails->date,$appDetails->from_time,$appDetails->to_time);
        if($isSessionFinished){
           if(count($appointments)==0){ //session notstarted all student appsent
                  $this->SessionNotStarted($appDetails);
                  $appointments=$this->courseAppointmentAttendenceRepo->getAll($appointment_id);
              }
          }
                
            foreach($appointments as $appointment){
                $row=array();
                $row['attand_time']= $appointment->attand_time;	
                $row['SessionID']=   $appointment->SessionID;
                $row['attand']=      $appointment->attand;
                $row['user_id']=    $appointment->user_id;
                $row['id']=    $appointment->id;
                $row['userName']=     $this->userRepo->getById($appointment->user_id)->name_ar;
                $attendances[]=$row;
            }
        
        return view('cp.instructor.courses.attendanceNormal',compact('attendances','details'));
    }

    public function SessionNotStarted($appointment){
        $course_id=$appointment->course_id;
        $students=$this->courseRepo->getAllTrainees($course_id);
        $Insertdata=array(); 
        foreach ($students as $k => $student) {
            $row = [];   
                $row['appointment_id']       = $appointment->id;
                $row['user_id']        = $student->id;
                $row['SessionID']= 1;
                $row['SessionCode']   =0;
                $row['attand']   =0;
                $row['active']   =0;
                $Insertdata[] = $row;
        }
        $this->courseAppointmentAttendenceRepo->saveBulk($Insertdata);
    }

    public function BBBAttandence($appointment_id){
        $appDetails=$this->courseAppRepo->getById($appointment_id);
        $details=array("Appointment_date"=>$appDetails->date,"Course_title"=>$appDetails->course->title,
                       "Course_id"=>$appDetails->course);

        $meeting_id=$appDetails->course->code.":".$appDetails->course->id.":".$appointment_id;
                              
        $attendances=array();
        // foreach($appointments as $appointment){
        //     $row=array();
        //     $row['attand_time']= $appointment->attand_time;	
	    //     $row['SessionID']=   $appointment->SessionID;
        //     $row['attand']=      $appointment->attand;
        //     $row['user_id']=    $appointment->user_id;
        //     $row['id']=    $appointment->id;
        //     $row['userName']=     $this->userRepo->getById($appointment->user_id)->name_ar;
        //     $attendances[]=$row;
        // }
        
        
        $Meeting=BBBHelper::getMeetingInfo($meeting_id);
        dd($Meeting);
        return view('cp.instructor.courses.attendanceNormal',compact('attendances','details'));

    }
    public function getMaxSessionId($appointment_id){
        $MaxSessionID=$this->courseAppointmentAttendenceRepo->getMaxSessionID($appointment_id);
        return $MaxSessionID;
    }

    public function ExpireAttandSession(Request $request){
        $inputs = $request->input();
        $appointment_id=$inputs['appointment_id'];
        $MaxSessionID=$this->courseAppointmentAttendenceRepo->getMaxSessionID($appointment_id);
        $MaxSessionID=(!isset($MaxSessionID))?0:$MaxSessionID;
        $OldSessions=$this->courseAppointmentAttendenceRepo->getBySessionID($appointment_id,$MaxSessionID);
        $this->courseAppointmentAttendenceRepo->updateBulk(array('active'=>false),$OldSessions);
    }



    public function StartNewSession(Request $request){
        $inputs = $request->input();
        $appointment_id=$inputs['appointment_id'];
        $duration=$inputs['duration'];
        $MaxSessionID=$this->courseAppointmentAttendenceRepo->getMaxSessionID($appointment_id);
        
        $MaxSessionID=(!isset($MaxSessionID))?0:$MaxSessionID;
        $appointment= $this->courseAppRepo->getById($appointment_id); 
        $course_id=$appointment->course_id;
        $students=$this->courseRepo->getAllTrainees($course_id);
        $SessionCode=rand(10000,10000000);
        $Insertdata=array(); 
        $StartattandanceTime=date('Y-m-d H:i:s'); 
        $sessionTimer= Carbon::parse($StartattandanceTime)->addMinutes($duration)->format('Y-m-d H:i:s');

        foreach ($students as $day => $student) {
            $row = [];   
                $row['appointment_id']       = $appointment_id;
                $row['user_id']        = $student->id;
                ($MaxSessionID==0)?  $row['SessionID']= 1:$row['SessionID']= $MaxSessionID+1;
                $row['SessionCode']   =$SessionCode;
                $row['duration']     = $duration;
                $row['StartattandanceTime']=$StartattandanceTime;
                $Insertdata[] = $row;
        }
     
        if($MaxSessionID==0){
            if($this->courseAppointmentAttendenceRepo->saveBulk($Insertdata))
             return array("SessionCode"=>$SessionCode,"sessionTimer"=>$sessionTimer);    
        }else{
            $OldSessions=$this->courseAppointmentAttendenceRepo->getBySessionID($appointment_id,$MaxSessionID);
            $done1=$this->courseAppointmentAttendenceRepo->updateBulk(array('active'=>false),$OldSessions);
            $done2=$this->courseAppointmentAttendenceRepo->saveBulk($Insertdata);
            if($done1 && $done2)
            return array("SessionCode"=>$SessionCode,"sessionTimer"=>$sessionTimer);              
        }
       }


    public function Attend_traineesbyInstructor(Request $request){
        $inputs = $request->input();
        $SessionsIds=$inputs['ids'];
        $attandstatus=$inputs['attandstatus'];
        //dd($SessionsIds);
        return $this->courseAppointmentAttendenceRepo->updateBulk(array('attand'=>$attandstatus),$SessionsIds);
       }
    
       public static function isSessionFinished($session_date,$session_from,$session_to){
        $new_startTime=date("H:i:s", strtotime($session_from));
        $new_endTime=date("H:i:s", strtotime($session_to));
        $cur_time=(Carbon::parse(date('H:i:s'))->format('H:i:s'));
        $st_time=($new_startTime);
        $end_time=($new_endTime);
        //if("2020-09-18" == $session_date)
        //dd(array("start_time"=>$st_time,"end_time"=>$end_time,"now"=>$cur_time,"session_date"=>$session_date,"nowdate"=>date("Y-m-d")));
        
       if (strtotime(date("Y-m-d")) > strtotime($session_date))
           return  true;
        if(date("Y-m-d") == $session_date)
           return (($st_time < $cur_time && $cur_time > $end_time));   
        
    }
}

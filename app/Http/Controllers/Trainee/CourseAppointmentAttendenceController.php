<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Helpers\DateHelper; 
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
        $this->middleware(['auth', 'authorize.trainee']);
    }

    public function FaceToFaceindex($appointment_id){
     // $this->courseAppointmentAttendenceRepo->
    }
    public function getMaxSessionId($appointment_id){
        $MaxSessionID=$this->courseAppointmentAttendenceRepo->getMaxSessionID($appointment_id);
        return $MaxSessionID;
    }

    public function AttandSession(Request $request){
        $inputs = $request->input();
        $session_id=$inputs['session_id'];
        $SessionCode=$inputs['SessionCode']; 
        $Session=$this->courseAppointmentAttendenceRepo->getById($session_id);
        if(!$Session->active)
          return "2";
        if($Session->SessionCode==$SessionCode)
         return $this->courseAppointmentAttendenceRepo->update(array('active'=>false,'attand'=>true,'attand_time'=>date('Y-m-d H:i:s')),$session_id);
        else
          return "3"; 
    }
}

<?php 

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\CourseAppointmentAttendanceEloquent;
use App\Models\CourseAppointmentAttendance;
class CourseAppointmentAttendanceRepo extends Repository implements CourseAppointmentAttendanceEloquent{
    
    public function __construct()
    {
        parent::__construct(new CourseAppointmentAttendance());
    }
    public function getAll($appointment_id = '')
    {
        return CourseAppointmentAttendance::where('appointment_id',$appointment_id)->get();
    }
    public function getMaxSessionID($appointment_id){
        return CourseAppointmentAttendance::where('appointment_id', $appointment_id)->max('SessionID');
    }
    public function getBySessionID($appointment_id,$Session_id){
        return CourseAppointmentAttendance::where('appointment_id',$appointment_id)->where('SessionID', $Session_id)->pluck('id')->toArray();
    }
    public function getBySessionIDAndUserId($appointment_id,$Session_id,$user_id){
        return CourseAppointmentAttendance::where('appointment_id',$appointment_id)->where('user_id', $user_id)->where('SessionID', $Session_id)->first();
    }
}
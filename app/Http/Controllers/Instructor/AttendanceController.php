<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Helpers\ZoomHelper;
use App\Models\Attendance;
use App\Models\Course;
use App\Models\User;
use App\Models\Webinar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Repositories\Eloquent\CourseAppointmentRepo;

class AttendanceController extends Controller
{
    var $appointmentRepo;

public function __construct(CourseAppointmentRepo $appointmentRepo){
        $this->appointmentRepo = $appointmentRepo;
        $this->middleware(['auth', 'authorize.instructor']);
    }
    /**
     * @param $webinarId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function webinarindex($webinarId){
        $webinar = Webinar::find($webinarId);
        $this->updateAttendances($webinar->course_id,$webinarId);
        ZoomHelper::getAttendeesReport($webinarId);
        $attendances  = $webinar->attendances;
        return view('cp.instructor.courses.attendance',compact('attendances'));
    }
    
    /**
     * @param $course_id
     * @param $webinar_id
     * @return bool
     */
    public function updateAttendances($course_id, $webinar_id){
        $course = Course::find($course_id);
        foreach ($course->students as $student){
                Attendance::updateOrCreate([
                    'course_id' => $course->id,
                    'webinar_id' => $webinar_id,
                    'user_id' => $student->id
                ], []);
        }

        return true;
    }

    public function attendStatus(Request $request,$webinarId,$userId){
        $attendance = Attendance::where('webinar_id',$webinarId)->where('user_id',$userId)->first();
        $attendance->attend = $request->get('attend');
        $attendance->save();

        return response()->json($attendance);
    }
}

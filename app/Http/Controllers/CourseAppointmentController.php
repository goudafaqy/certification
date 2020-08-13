<?php

namespace App\Http\Controllers;

use App\Http\Helpers\DateHelper;
use App\Http\Repositories\Validation\CourseAppointmentRepoValidation;
use App\Http\Repositories\Eloquent\CourseAppointmentRepo;
use App\Http\Repositories\Eloquent\CourseRepo;
use Illuminate\Http\Request;

class CourseAppointmentController extends Controller
{
    var $courseRepo;
    var $userRepo;
    var $categoryRepo;
    var $classRepo;
    var $courseValidation;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CourseRepo $courseRepo, 
        CourseAppointmentRepo $courseAppRepo, 
        CourseAppointmentRepoValidation $courseAppValidation
    )
    {
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
        return view("appointments.appointments-list", ['course' => $course, 'appointments' => $appointments]);
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
        $data = [];
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
            }
        }
        return ($this->courseAppRepo->saveBulk($data)) ? true : false ;
    }

    /**
     * Delete appointment ...
     */
    public function reset($course_id)
    {
        $result = $this->courseAppRepo->deleteByCourseId($course_id);
        if($result){
            return redirect('courses/appointments/'.$course_id)->with('deleted', 'تم حذف الموعد بنجاح');
        }
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
}

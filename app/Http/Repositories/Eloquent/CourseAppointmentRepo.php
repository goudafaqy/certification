<?php 

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\CourseAppointmentEloquent;
use App\Models\CourseAppintment;
class CourseAppointmentRepo extends Repository implements CourseAppointmentEloquent{
    
    public function __construct()
    {
        parent::__construct(new CourseAppintment());
    }

    public function getAll($course_id = '',$orderby=false)
    {
        if($orderby)
          return CourseAppintment::where('course_id',$course_id)->orderBy('date','asc')->get();
        else
          return CourseAppintment::where('course_id',$course_id)->get();
    }
   
    public function deleteByCourseId($course_id)
    {
        return CourseAppintment::where('course_id', $course_id)->delete();
    }
    public function IsDateInCourse($course_id,$date)
    {
        return CourseAppintment::where('course_id', $course_id)->where('date',$date)->get()->count()==0?  false: true;
    }

}
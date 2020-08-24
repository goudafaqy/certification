<?php 

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\CourseAppointmentEloquent;
use App\Models\CourseAppintment;
class CourseAppointmentRepo extends Repository implements CourseAppointmentEloquent{
    
    public function __construct()
    {
        parent::__construct(new CourseAppintment());
    }
    
    public function deleteByCourseId($course_id)
    {
        return CourseAppintment::where('course_id', $course_id)->delete();
    }

}
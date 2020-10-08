<?php 

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\CourseUpdateEloquent;
use App\Models\CourseUpdate;
class CourseUpdateRepo extends Repository implements CourseUpdateEloquent{
    
    public function __construct()
    {
        parent::__construct(new CourseUpdate());
    }

    public function getAll($course_id = '')
    {
        return CourseUpdate::where('course_id',$course_id)->orderBy('id', 'desc')->get();
    }
    
    public function deleteByCourseId($course_id)
    {
        return CourseUpdate::where('course_id', $course_id)->delete();
    }

}
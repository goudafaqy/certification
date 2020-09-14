<?php 

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\CourseRatingEloquent;
use App\Models\CourseRating;
class CourseRatingRepo extends Repository implements CourseRatingEloquent{
    
    public function __construct()
    {
        parent::__construct(new CourseRating());
    }

    public function getAll($course_id = '')
    {
        return CourseRating::where('course_id',$course_id)->get();
    }
    
    public function deleteByCourseId($course_id)
    {
        return CourseRating::where('course_id', $course_id)->delete();
    }
    public function getRateForSpecificUser($course_id ,$user_id)
    {
        return CourseRating::where('course_id',$course_id)->where('user_id',$user_id)->first();
    }
    
}
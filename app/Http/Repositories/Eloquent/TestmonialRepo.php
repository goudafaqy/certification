<?php 

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\TestmonialEloquent;
use App\Models\Testmonial;

class TestmonialRepo extends Repository implements TestmonialEloquent{

    public function __construct()
    {
        parent::__construct(new Testmonial());
    }

    public function getAll($course_id = '')
    {
        return Testmonial::where('course_id',$course_id)->get();
    }

    public function getByCourseWhereNotField($course_id, $field, $fieldValue)
    {
        return Testmonial::where('course_id',$course_id)->where("$field", '!=' , "$fieldValue")->get();
    }

    public function getByCourseWhereField($course_id, $field, $fieldValue)
    {
        return Testmonial::where('course_id', $course_id)->where("$field", "$fieldValue")->first();
    }
}
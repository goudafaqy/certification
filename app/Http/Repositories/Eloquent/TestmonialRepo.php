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
        return Testmonial::get();
    }

    public function getByCourseWhereNotField($field, $fieldValue)
    {
        return Testmonial::where("$field", '!=' , "$fieldValue")->get();
    }

    public function getByCourseWhereField( $field, $fieldValue)
    {
        return Testmonial::where("$field", "$fieldValue")->first();
    }
}
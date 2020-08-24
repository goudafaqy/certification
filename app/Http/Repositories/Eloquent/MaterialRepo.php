<?php 

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\MaterialEloquent;
use App\Models\Material;

class MaterialRepo extends Repository implements MaterialEloquent{

    public function __construct()
    {
        parent::__construct(new Material());
    }

    public function getAll($course_id = '')
    {
        return Material::where('course_id',$course_id)->get();
    }

    public function getByCourseWhereNotField($course_id, $field, $fieldValue)
    {
        return Material::where('course_id',$course_id)->where("$field", '!=' , "$fieldValue")->get();
    }

    public function getByCourseWhereField($course_id, $field, $fieldValue)
    {
        return Material::where('course_id', $course_id)->where("$field", "$fieldValue")->first();
    }
}
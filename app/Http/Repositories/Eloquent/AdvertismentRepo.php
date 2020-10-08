<?php 

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\AdvertismentEloquent;
use App\Models\Advertisment;

class AdvertismentRepo extends Repository implements AdvertismentEloquent{

    public function __construct()
    {
        parent::__construct(new Advertisment());
    }

    public function getAll($course_id = '')
    {
        return Advertisment::get();
    }

    public function getByCourseWhereNotField($course_id, $field, $fieldValue)
    {
        return Advertisment::where("$field", '!=' , "$fieldValue")->get();
    }

    public function getByCourseWhereField($course_id, $field, $fieldValue)
    {
        return Advertisment::where("$field", "$fieldValue")->first();
    }
}
<?php 

namespace App\Http\Repositories\Validation;

use App\Http\Interfaces\Validation\CourseValidation;
use Illuminate\Support\Facades\Validator;

class CourseRepoValidation implements CourseValidation{
    
    private function getRules(){
        return [
            'insert' => [
                'title_ar' => 'required',
                'overview' => 'required',
                'type' => 'required',
                'instructor_id' => 'required',
                'cat_id' => 'required',
                'pass_grade' => 'required',
                'skill_level' => 'required',
                'reg_start_date' => 'required',
                'reg_end_date' => 'required',
                'seats' => 'required',
            ],
            'update' => [
                'title_ar' => 'required',
                'code' => 'required',
                'overview' => 'required',
                'type' => 'required',
                'instructor_id' => 'required',
                'cat_id' => 'required',
                'pass_grade' => 'required',
                'skill_level' => 'required',
                'reg_start_date' => 'required',
                'reg_end_date' => 'required',
                'seats' => 'required',
            ],
        ];
    }

    public function doValidate($inputs, $action){
        return Validator::make($inputs, $this->getRules()["$action"]);
    } 

}
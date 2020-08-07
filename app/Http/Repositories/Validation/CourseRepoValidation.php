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
                'class_id' => 'required',
                'price' => 'required',
                'discount' => 'required',
            ],
            'update' => [
                'title_ar' => 'required',
                'code' => 'required',
                'overview' => 'required',
                'type' => 'required',
                'instructor_id' => 'required',
                'cat_id' => 'required',
                'class_id' => 'required',
                'price' => 'required',
                'discount' => 'required',
            ],
        ];
    }

    public function doValidate($inputs, $action){
        return Validator::make($inputs, $this->getRules()["$action"]);
    } 

}
<?php 

namespace App\Http\Repositories\Validation;

use App\Http\Interfaces\Validation\CourseValidation;
use Illuminate\Support\Facades\Validator;

class MaterialRepoValidation implements CourseValidation{
    
    private function getRules(){
        return [
            'insert' => [
                'name_ar' => 'required',
                'name_en' => 'required',
                'type' => 'required',
                'course_id' => 'required',
                'source' => 'required',
                'description' => 'required'
            ],
            'update' => [
                'name_ar' => 'required',
                'name_en' => 'required',
                'type' => 'required',
                'course_id' => 'required',
                'source' => 'required',
                'description' => 'required'
            ],
        ];
    }

    public function doValidate($inputs, $action){
        return Validator::make($inputs, $this->getRules()["$action"]);
    } 

}
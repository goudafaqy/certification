<?php 

namespace App\Http\Repositories\Validation;

use App\Http\Interfaces\Validation\CourseAppointmentValidation;
use Illuminate\Support\Facades\Validator;

class CourseAppointmentRepoValidation implements CourseAppointmentValidation{
    
    private function getRules(){
        return [
            'insert' => [
                'title' => 'required',
            ],
            'update' => [
                'title' => 'required',
            ],
        ];
    }

    public function doValidate($inputs, $action){
        return Validator::make($inputs, $this->getRules()["$action"]);
    } 

}
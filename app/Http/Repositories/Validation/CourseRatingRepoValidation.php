<?php 

namespace App\Http\Repositories\Validation;

use App\Http\Interfaces\Validation\CourseRatingValidation;
use Illuminate\Support\Facades\Validator;

class CourseRatingRepoValidation implements CourseRatingValidation{
    
    private function getRules(){
        return [
            'insert' => [
                'rating' => 'required',
            ],
            
            'update' => [
                'rating' => 'required',
            ],
        ];
    }

    public function doValidate($inputs, $action){
        return Validator::make($inputs, $this->getRules()["$action"]);
    } 

}
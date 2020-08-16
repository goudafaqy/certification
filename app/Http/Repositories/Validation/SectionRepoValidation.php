<?php 

namespace App\Http\Repositories\Validation;

use App\Http\Interfaces\Validation\SectionValidation;
use Illuminate\Support\Facades\Validator;

class SectionRepoValidation implements SectionValidation{
    
    private function getRules(){
        return [
            'insert' => [
                'title_ar' => 'required',
                'course_id' => 'required'
            ],
            'update' => [
                'title_ar' => 'required',
                'course_id' => 'required'
            ],
        ];
    }

    public function doValidate($inputs, $action){
        return Validator::make($inputs, $this->getRules()["$action"]);
    } 

}
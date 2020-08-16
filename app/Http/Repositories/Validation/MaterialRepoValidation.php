<?php 

namespace App\Http\Repositories\Validation;

use App\Http\Interfaces\Validation\MaterialValidation;
use Illuminate\Support\Facades\Validator;

class MaterialRepoValidation implements MaterialValidation{
    
    private function getRules(){
        return [
            'insert' => [
                'name_ar' => 'required',
                'type' => 'required',
                'course_id' => 'required',
                'source' => '',
                'description' => 'required'
            ],
            'update' => [
                'name_ar' => 'required',
                'type' => 'required',
                'course_id' => 'required',
                'source' => '',
                'description' => 'required'
            ],
        ];
    }

    public function doValidate($inputs, $action){
        return Validator::make($inputs, $this->getRules()["$action"]);
    } 

}
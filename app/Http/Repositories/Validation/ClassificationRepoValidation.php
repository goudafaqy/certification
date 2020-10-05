<?php 

namespace App\Http\Repositories\Validation;

use App\Http\Interfaces\Validation\ClassificationValidation;
use Illuminate\Support\Facades\Validator;

class ClassificationRepoValidation implements ClassificationValidation{
    
    private function getRules(){
        return [
            'insert' => [
                'title_ar' => 'required',
                'title_en' => 'required',
                'cat_id' => 'required',
            ],
            'update' => [
                'title_ar' => 'required',
                'title_en' => 'required',
                'cat_id' => 'required',
            ],
        ];
    }

    public function doValidate($inputs, $action){
        return Validator::make($inputs, $this->getRules()["$action"]);
    } 

}
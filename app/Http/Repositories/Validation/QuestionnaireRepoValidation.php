<?php

namespace App\Http\Repositories\Validation;

use App\Http\Interfaces\Validation\ClassificationValidation;
use App\Http\Interfaces\Validation\QuestionnaireValidation;
use Illuminate\Support\Facades\Validator;

class QuestionnaireRepoValidation implements QuestionnaireValidation {

    private function getRules(){
        return [
            'insert' => [
                'name' => 'required',
                'publish_date' => 'required',
                'questions' => 'required|array',
            ],
            'update' => [
                'name' => 'required',
                'publish_date' => 'required',
                'questions' => 'required|array',
            ],
        ];
    }

    public function doValidate($inputs, $action){
        return Validator::make($inputs, $this->getRules()["$action"]);
    }

}

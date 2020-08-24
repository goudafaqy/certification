<?php

namespace App\Http\Repositories\Validation;

use App\Http\Interfaces\Validation\MaterialValidation;
use Illuminate\Support\Facades\Validator;

class ExamRepoValidation implements MaterialValidation{

    private function getRules(){
        return [
            'insert' => [
                'title_ar' => 'required',
                'type' => 'required|in:exam,assignment',
                'exam_date' => 'required|date_format:Y-m-d',
                'questions_no'=> 'numeric',
                'question_point'=> 'nullable|numeric',
                'start_time' => 'required|date_format:H:i',
                'end_time' => 'required|date_format:H:i',
                'duration' => 'required|numeric',
                'questions' => 'nullable|file|mimes:xls,xlsx,csv'
            ],
            'update' => [

            ],
        ];
    }

    public function doValidate($inputs, $action){
        return Validator::make($inputs, $this->getRules()["$action"]);
    }

}

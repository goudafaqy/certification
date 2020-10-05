<?php


namespace App\Http\Repositories\Validation;


use Illuminate\Support\Facades\Validator;

class WebinarRepoValidation
{
    private function getWebinars(){
        return [
            'insert' => [
                'topic' => 'required',
                'start_time' => 'required',
                'duration' => 'required',
            ],
            'update' => [
                'topic' => 'required',
                'start_time' => 'required',
                'duration' => 'required',
            ],
        ];
    }

    public function doValidate($inputs, $action){
        return Validator::make($inputs, $this->getWebinars()["$action"]);
    }
}

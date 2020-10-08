<?php 

namespace App\Http\Repositories\Validation;

use App\Http\Interfaces\Validation\NotificationValidation;
use Illuminate\Support\Facades\Validator;

class TestmonialRepoValidation implements NotificationValidation{
    
    private function getRules(){
        return [
            'insert' => [
                'title' => 'required',
                'name' => 'required',
                'message' => 'required',
               
            ],
            'update' => [
                'title' => 'required',
                'name' => 'required',
                'message' => 'required',
            ],
        ];
    }

    public function doValidate($inputs, $action){
        return Validator::make($inputs, $this->getRules()["$action"]);
    } 

}
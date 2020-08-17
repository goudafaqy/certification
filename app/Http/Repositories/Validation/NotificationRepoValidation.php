<?php 

namespace App\Http\Repositories\Validation;

use App\Http\Interfaces\Validation\NotificationValidation;
use Illuminate\Support\Facades\Validator;

class NotificationRepoValidation implements NotificationValidation{
    
    private function getRules(){
        return [
            'insert' => [
                'title_ar' => 'required',
                'type' => 'required',
                'message_ar' => 'required',
               
            ],
            'update' => [
                'title_ar' => 'required',
                'type' => 'required',
                'message_ar' => 'required',
            ],
        ];
    }

    public function doValidate($inputs, $action){
        return Validator::make($inputs, $this->getRules()["$action"]);
    } 

}
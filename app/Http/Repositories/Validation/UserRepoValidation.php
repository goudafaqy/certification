<?php 

namespace App\Http\Repositories\Validation;

use App\Http\Interfaces\Validation\UserValidation;
use Illuminate\Support\Facades\Validator;

class UserRepoValidation implements UserValidation{
    
    private function getRules(){
        return [
            'insert' => [
                'name_ar' => 'required',
                'name_en' => 'required',
                'username' => 'required',
                'email' => 'required|unique:users|email',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
                'role' => 'required',
            ],
            'update' => [
                'name_ar' => 'required',
                'name_en' => 'required',
                'username' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
                'role' => 'required',
            ],
        ];
    }

    public function doValidate($inputs, $action){
        return Validator::make($inputs, $this->getRules()["$action"]);
    } 

}
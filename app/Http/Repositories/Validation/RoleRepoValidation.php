<?php 

namespace App\Http\Repositories\Validation;

use App\Http\Interfaces\Validation\RoleValidation;
use Illuminate\Support\Facades\Validator;

class RoleRepoValidation implements RoleValidation{
    
    private function getRules(){
        return [
            'insert' => [
                'role' => 'required',
            ],
            'update' => [
                'role' => 'required',
            ],
        ];
    }

    public function doValidate($inputs, $action){
        return Validator::make($inputs, $this->getRules()["$action"]);
    } 

}
<?php

namespace App\Http\Repositories\Validation;

use App\Http\Interfaces\Validation\MaterialValidation;
use App\Http\Interfaces\Validation\SupportValidation;
use Illuminate\Support\Facades\Validator;

class SupportRepoValidation implements SupportValidation {

    private function getRules(){
        return [
            'ticket' => [
                'subject' => 'required',
                'content' => 'required',
                'attachments' => 'nullable|array',
                'attachments.*' => 'file'
            ],
            'comment' => [
                'content' => 'required',
                'attachments' => 'nullable|array',
                'attachments.*' => 'file'
            ],
        ];
    }

    public function doValidate($inputs, $action){
        return Validator::make($inputs, $this->getRules()["$action"]);
    }

}

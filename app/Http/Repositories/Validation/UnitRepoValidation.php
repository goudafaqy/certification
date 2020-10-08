<?php 

namespace App\Http\Repositories\Validation;

use App\Http\Interfaces\Validation\UnitValidation;
use Illuminate\Support\Facades\Validator;

class UnitRepoValidation implements UnitValidation{
    
    private function getRules(){
        return [
            'insert' => [
                'title_ar' => 'required',
                'title_en' => 'required',
                'section_id' => 'required',
                'duration' => 'required',
                'source_type' => 'required',
                'text' => 'required',
                'link' => 'required'
            ],
            'update' => [
                'title_ar' => 'required',
                'title_en' => 'required',
                'section_id' => 'required',
                'duration' => 'required',
                'source_type' => 'required',
                'text' => 'required',
                'link' => 'required'
            ],
        ];
    }

    public function doValidate($inputs, $action){
        return Validator::make($inputs, $this->getRules()["$action"]);
    } 

}
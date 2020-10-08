<?php 

namespace App\Http\Repositories\Validation;

use App\Http\Interfaces\Validation\CategoryValidation;
use Illuminate\Support\Facades\Validator;

class CategoryRepoValidation implements CategoryValidation{
    
    private function getRules(){
        return [
            'insert' => [
                'title_ar' => 'required',
                'title_en' => 'required',
                'letter' => 'required',
            ],
            'update' => [
                'title_ar' => 'required',
                'title_en' => 'required',
                'letter' => 'required',
            ],
        ];
    }

    public function doValidate($inputs, $action){
        return Validator::make($inputs, $this->getRules()["$action"]);
    } 

}
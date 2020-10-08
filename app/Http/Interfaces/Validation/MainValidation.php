<?php 

namespace App\Http\Interfaces\Validation;

interface MainValidation {

    public function doValidate($inputs, $action);

}
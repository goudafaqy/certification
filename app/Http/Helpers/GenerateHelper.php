<?php 

namespace App\Http\Helpers;

class GenerateHelper{

    public static function generateCourseCode($id){
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
        $char = substr(str_shuffle($str_result), 0, 4); 
        return $char . "-".$id;
    }

}
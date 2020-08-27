<?php 

namespace App\Http\Helpers;

class GenerateHelper{

    public static function generateCourseCode($id, $categoryLetter){
        $prefix = "JTC";
        $higri = "42"; // To do automatically ...
        return $prefix . "-" . $categoryLetter . $higri . $id;
    }

}
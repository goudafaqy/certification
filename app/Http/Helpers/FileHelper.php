<?php 

namespace App\Http\Helpers;

class FileHelper{

    public static function uploadFiles($file, $pathToUpload){
        $fileName = $file->getClientOriginalName();
        $fileExt = $file->getClientOriginalExtension();
        $filePath = $pathToUpload.$fileName;

        $file->move($pathToUpload ,$file->getClientOriginalName());

        return $filePath;
    }

}
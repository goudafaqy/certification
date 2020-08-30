<?php

namespace App\Http\Helpers;

class FileHelper
{

    public static function uploadFiles($file, $pathToUpload, $fileName = null)
    {
        $fileExt = $file->getClientOriginalExtension();
        $fileName = is_null($fileName) ? $file->getClientOriginalName() : ($fileName.".".$fileExt);
        $filePath = $pathToUpload . $fileName;

        $file->move($pathToUpload, $fileName);

        return $filePath;
    }

}

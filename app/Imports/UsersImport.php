<?php

namespace App\Imports;

use App\Models\CourseUser;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;


class UsersImport implements ToModel, WithStartRow
{
   
    public function startRow(): int
    {
        return 2;
    }
    public function model(array $row)
    {
        return new CourseUser([
            'title'     => $row[0],
            'name'     =>  $row[1],
            'email'    =>   $row[2], 
            'phone' =>      $row[3],
            'national_id' =>   $row[4],
            'course' =>request()->course_id

        ]);
    }
}

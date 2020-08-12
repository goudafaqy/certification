<?php 

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\CourseAppointmentEloquent;
use App\Models\CourseAppintment;

class CourseAppointmentRepo implements CourseAppointmentEloquent{
    
    public function getAll()
    {
        return CourseAppintment::all();
    }


    public function getById($id)
    {
        return CourseAppintment::where('id', $id)->first();
    }


    public function save($inputs, $getId = false)
    {
        return ($getId) ? CourseAppintment::insertGetId($inputs) : CourseAppintment::create($inputs) ;
    }

    public function update($inputs, $id)
    {
        return CourseAppintment::where('id', $id)->update($inputs);
    }


    public function delete($id)
    {
        return CourseAppintment::where('id', $id)->delete();
    }

}
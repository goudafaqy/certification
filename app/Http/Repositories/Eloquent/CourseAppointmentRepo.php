<?php 

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\CourseAppointmentEloquent;
use App\Models\CourseAppintment;

class CourseAppointmentRepo implements CourseAppointmentEloquent{
    
    public function getAll()
    {
        return CourseAppintment::all()->sortBy('date');
    }


    public function getById($id)
    {
        return CourseAppintment::find($id);
    }


    public function save($inputs, $getId = false)
    {
        return ($getId) ? CourseAppintment::insertGetId($inputs) : CourseAppintment::create($inputs) ;
    }

    public function saveBulk($inputs)
    {
        return CourseAppintment::insert($inputs) ;
    }

    public function update($inputs, $id)
    {
        return CourseAppintment::where('id', $id)->update($inputs);
    }


    public function delete($id)
    {
        return CourseAppintment::where('id', $id)->delete();
    }

    public function deleteByCourseId($course_id)
    {
        return CourseAppintment::where('course_id', $course_id)->delete();
    }

}
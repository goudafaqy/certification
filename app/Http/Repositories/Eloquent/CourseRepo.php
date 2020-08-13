<?php 

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\CourseEloquent;
use App\Models\Course;

class CourseRepo implements CourseEloquent{
    
    public function getAll()
    {
        return Course::all();
    }


    public function getById($id)
    {
        return Course::find($id);
    }


    public function save($inputs, $getId = false)
    {
        return ($getId) ? Course::insertGetId($inputs) : Course::create($inputs) ;
    }

    public function update($inputs, $id)
    {
        return Course::where('id', $id)->update($inputs);
    }


    public function delete($id)
    {
        return Course::where('id', $id)->delete();
    }

}
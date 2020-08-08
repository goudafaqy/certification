<?php 

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\CourseEloquent;
use App\Models\Material;

class MaterialRepo implements CourseEloquent{
    
    public function getAll($course_id = '')
    {
        return Material::where('course_id',$course_id)->get();
    }


    public function getById($id)
    {
        return Material::where('id', $id)->first();
    }


    public function save($inputs, $getId = false)
    {
        return ($getId) ? Material::insertGetId($inputs) : Material::create($inputs) ;
    }

    public function update($inputs, $id)
    {
        return Material::where('id', $id)->update($inputs);
    }


    public function delete($id)
    {
        return Material::where('id', $id)->delete();
    }

}
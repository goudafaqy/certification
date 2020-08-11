<?php 

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\SectionEloquent;
use App\Models\Section;

class SectionRepo implements SectionEloquent{
    
    public function getAll($course_id = '')
    {
        return Section::where('course_id',$course_id)->get();
    }


    public function getById($id)
    {
        return Section::where('id', $id)->first();
    }


    public function save($inputs, $getId = false)
    {
        return ($getId) ? Section::insertGetId($inputs) : Section::create($inputs);
    }

    public function update($inputs, $id)
    {
        return Section::where('id', $id)->update($inputs);
    }


    public function delete($id)
    {
        return Section::where('id', $id)->delete();
    }

}
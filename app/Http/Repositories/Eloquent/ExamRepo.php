<?php

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\ExamEloquent;
use App\Models\Exam;

class ExamRepo implements ExamEloquent{

    public function getAll($course_id = '')
    {
        return Exam::where('course_id',$course_id)->get();
    }


    public function getById($id)
    {
        return Exam::where('id', $id)->first();
    }


    public function save($inputs, $getId = false)
    {
        return ($getId) ? Exam::insertGetId($inputs) : Exam::create($inputs);
    }

    public function update($inputs, $id)
    {
        return Exam::where('id', $id)->update($inputs);
    }


    public function delete($id)
    {
        return Exam::where('id', $id)->delete();
    }

}

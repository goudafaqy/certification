<?php

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\CourseEloquent;
use App\Models\Course;
use Carbon\Carbon;

class CourseRepo implements CourseEloquent
{

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
        return ($getId) ? Course::insertGetId($inputs) : Course::create($inputs);
    }

    public function update($inputs, $id)
    {
        return Course::where('id', $id)->update($inputs);
    }


    public function delete($id)
    {
        return Course::where('id', $id)->delete();
    }


    public function getByInstructor($instructor_id)
    {

        return Course::where('instructor_id', $instructor_id)->get();
    }

    public function getCurrentByInstructor($instructor_id)
    {
        return Course::where('instructor_id', $instructor_id)
            ->where('end_date', '>=', Carbon::now())->get();
    }

    public function getPastByInstructor($instructor_id)
    {
        return Course::where('instructor_id', $instructor_id)
            ->where('end_date', '<', Carbon::now())->get();
    }

}

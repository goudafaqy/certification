<?php

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\CourseEloquent;
use App\Models\Course;
use Carbon\Carbon;

class CourseRepo extends Repository implements CourseEloquent
{
    public function __construct()
    {
        parent::__construct(new Course());
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

    public function getAllTrainees($course_id)
    {
        return Course::find($course_id)->students;
    }

    public function generateNewCourseVirsionCode($code)
    {
        $oldCode = explode("_", $code)[0];
        $latest = Course::select('code')->where("code", "like", "$oldCode%")
        ->orderByDesc('id')->first()->code;
        $base = explode("_", $latest)[0];
        $newVirsion = explode("_", $latest)[1];
        $newVirsion = (int)$newVirsion;
        return  $base . "_" .  ++$newVirsion;
    }
}

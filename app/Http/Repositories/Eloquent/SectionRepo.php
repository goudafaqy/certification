<?php 

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\SectionEloquent;
use App\Models\Section;

class SectionRepo extends Repository implements SectionEloquent{
    
    public function __construct()
    {
        parent::__construct(new Section());
    }

    public function getAll($course_id = '')
    {
        return Section::where('course_id',$course_id)->get();
    }
}
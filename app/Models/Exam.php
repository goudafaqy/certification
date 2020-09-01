<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Exam extends Model
{

    protected $table = 'course_exams';

    protected $primaryKey = 'id';

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_ar',
        'title_en',
        'course_id',
        'type',
        'exam_date',
        'guide_ar',
        'guide_en',
        'duration',
        'questions_no',
        'question_point',
        'start_time',
        'end_time',
        'created_at',
        'updated_at',
    ];


    /**
     * Get the courses for the Course.
     */
    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }

    public function getEndDateTimeAttribute()
    {
        return $this->exam_date . " " . $this->end_time . ":59";
    }

    public function getStartDateTimeAttribute()
    {
        return $this->exam_date . " " . $this->start_time . ":00";
    }

    public function getFullMarkAttribute()
    {
        return $this->questions_no * $this->question_point;
    }
}

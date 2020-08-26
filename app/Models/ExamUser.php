<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamUser extends Model
{

    protected $table = 'course_exam_user';

    protected $primaryKey = 'id';

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'exam_id',
        'submitted',
        'start_time',
        'submit_time',
        'created_at',
        'updated_at',
    ];


    /**
     * Get the User Answers for the Exam.
     */
    public function userQuestions()
    {
        return $this->hasMany('App\Models\ExamUserAnswer', 'course_exam_user_id');
    }

    /**
     * Get the Exam
     */
    public function exam()
    {
        return $this->belongsTo('App\Models\Exam', 'exam_id');
    }
}

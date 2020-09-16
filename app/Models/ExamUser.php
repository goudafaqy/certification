<?php

namespace App\Models;

use Carbon\Carbon;
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
        'reviewed',
        'reviewed_date',
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

    /**
     * Get the User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }


    public function getDurationAttribute(){
        if($this->submitted)
           return Carbon::make($this->submit_time)->diffInMinutes(Carbon::make($this->start_time));

        if(Carbon::now() > Carbon::make($this->exam->end_date_time))
            return $this->exam->duration;

        return Carbon::now()->diffInMinutes(Carbon::make($this->start_time));
    }


    public function getExamGrade(){
        if(!$this->reviewed) return 0;

        $grade = 0;
        foreach ($this->userQuestions as $userQuestion){
            if($userQuestion->graded)
                $grade += $userQuestion->grade;
        }

        return $grade;
    }

    public function isExamEnded(){
        if($this->submitted) return true;

        if(Carbon::now() > Carbon::make($this->exam->end_date_time)) return true;

        if(Carbon::now() > Carbon::make($this->start_time)->addMinutes($this->exam->duration)) return true;

        return false;
    }
}

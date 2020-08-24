<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamUserAnswer extends Model
{

    protected $table = 'course_exam_user_answers';

    protected $primaryKey = 'id';

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'exam_user_id',
        'question_id',
        'answer_MC',
        'answer_TF',
        'answer_FT',
        'answer_FU',
        'created_at',
        'updated_at',
    ];


    /**
     * Get the Question
     */
    public function question()
    {
        return $this->belongsTo('App\Models\Question', 'question_id');
    }
}

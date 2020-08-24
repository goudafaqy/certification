<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Question extends Model
{

    protected $table = 'course_exam_questions';

    protected $primaryKey = 'id';

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'exam_id',
        'type',
        'question_en',
        'question_ar',
        'answer_MC',
        'answer_TF',
        'type_OC',
        'created_at',
        'updated_at',
    ];

    public function getAnswersAttribute(){
        if($this->type != 'MC') return [];
        $choices = json_decode($this->answer_MC, true);

        return array_keys($choices);
    }


    /**
     * Get the courses for the Exam.
     */
    public function exam()
    {
        return $this->belongsTo('App\Models\Exam', 'exam_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamUserAnswer extends Model
{

    protected $table = 'course_exam_user_answers';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $casts = [
        'answer_TF' => 'boolean'
    ];

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
        'graded',
        'grade',
        'created_at',
        'updated_at',
    ];


    function getMcAnswersAttribute(){
        return json_decode($this->answer_MC);
    }

    function mcCheckecd($i){
        return in_array($i, $this->mcAnswers);
    }

    function mcIsCorrectAnswer($i){
        if(!$this->mcCheckecd($i)) return null;

        $correctAnswers = $this->question->getMCCorrectAnswers();

        return in_array($i, $correctAnswers);
    }

    /**
     * Get the Question
     */
    public function question()
    {
        return $this->belongsTo('App\Models\Question', 'question_id');
    }

    public function getAnsweredAttribute(){

        if ($this->question->type == 'MC' && $this->answer_MC) return true;
        elseif ($this->question->type == 'TF' && !is_null($this->answer_TF)) return true;
        elseif ($this->question->type == 'OC' && $this->question->type_OC == 'FT' && $this->answer_FT) return true;
        elseif ($this->question->type == 'OC' && $this->question->type_OC == 'FU' && $this->answer_FU) return true;

        return false;

    }

    public function isAnswerCorrect(){
        if($this->question->type == 'MC'){
            foreach ($this->mcAnswers as $userChoice){
                if($this->mcIsCorrectAnswer($userChoice)) return true;
            }

            return false;
        }

        if($this->question->type == 'TF')
            return $this->answer_TF === $this->question->answer_TF;

        return true;
    }
}

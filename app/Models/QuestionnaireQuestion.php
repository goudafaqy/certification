<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class QuestionnaireQuestion extends Model
{

    protected $table = 'course_questionnaire_questions';

    protected $primaryKey = 'id';

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'questionnaire_id',
        'type',
        'question',
        'choices',
        'min_num',
        'max_num',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'choices' => 'array',
    ];


    public function questionnaire()
    {
        return $this->belongsTo('App\Models\Questionnaire', 'questionnaire_id');
    }

    public function answers()
    {
        return $this->hasMany('App\Models\QuestionnaireAnswer', 'question_id');
    }


    public function answerCount($i)
    {
        $c = 0;
        foreach ($this->answers as $answer) {
            if ($this->type == 'MC') {
                $choices = json_decode($answer->answer);
                if(in_array($i, $choices)) $c++;
            }else{
                if($i == $answer->answer) $c++;
            }
        }
        return $c;
    }

    public function answerNMSum(){
        if($this->type != 'NM') return 0;

        return $this->answers()->sum('answer');
    }

    public function answerNMAvg(){
        if($this->type != 'NM') return 0;

        return $this->answers()->average('answer');
    }
}

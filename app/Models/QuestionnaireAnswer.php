<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class QuestionnaireAnswer extends Model
{

    protected $table = 'course_questionnaire_answers';

    protected $primaryKey = 'id';

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'questionnaire_id',
        'question_id',
        'answer',
        'created_at',
        'updated_at',
    ];


    public function questionnaire()
    {
        return $this->belongsTo('App\Models\Questionnaire', 'questionnaire_id');
    }


    public function question()
    {
        return $this->belongsTo('App\Models\QuestionnaireQuestion', 'question_id');
    }


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}

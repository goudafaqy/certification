<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Questionnaire extends Model
{

    protected $table = 'course_questionnaires';

    protected $primaryKey = 'id';

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id',
        'user_id',
        'name',
        'details',
        'type',
        'publish_date',
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

    public function user()
    {
        return $this->belongsTo('App\User', 'course_id');
    }

    public function questions()
    {
        return $this->hasMany('App\Models\QuestionnaireQuestion', 'questionnaire_id');
    }

    public function answers()
    {
        return $this->hasMany('App\Models\QuestionnaireAnswer', 'questionnaire_id');
    }


    public function getShortNameAttribute(){

        return Str::limit($this->name, 50, $end='...');
    }

    public function isUserTake(){

        return $this->answers()->where('user_id', Auth::user()->id)->count();
    }

    public function userAnswersCount(){
        return $this->answers()->distinct('user_id')->count();
    }
}

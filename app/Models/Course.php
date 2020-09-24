<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Course extends Model
{

    protected $table = 'courses';

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
        'code',
        'overview',
        'objective',
        'instructor_id',
        'class_id',
        'cat_id',
        'price',
        'discount',
        'type',
        'image',
        'seats',
        'zoom',
        'created_at',
        'updated_at',
    ];

//    protected $dates = ['start_date','end_date', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * Get the category that owns the course.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'cat_id');
    }

    /**
     * Get the classification that owns the course.
     */
    public function classification()
    {
        return $this->belongsTo('App\Models\Classification', 'class_id');
    }

    /**
     * Get the instructor that owns the course.
     */
    public function instructor()
    {
        return $this->belongsTo('App\Models\User', 'instructor_id');
    }

    /**
     * Get the appointments for the course.
     */
    public function appointments()
    {
        return $this->hasMany('App\Models\CourseAppintment');
    }
    public function ratings(){
        return $this->hasMany('App\Models\CourseRating');
    }
    /**
     * Get the students for the course.
     */
    public function students()
    {
        return $this->belongsToMany('App\Models\User', 'course_user');
    }

    /**
     * Get the the title localized.
     */
    public function getTitleAttribute()
    {
        return $this["title_" . App::getLocale()];
    }

    /**
     * Get the updates for the course.
     */
    public function updates()
    {
        return $this->hasMany('App\Models\CourseUpdate');
    }

    /**
     * Get the materials for the course.
     */
    public function materials()
    {
        return $this->hasMany('App\Models\Material', 'course_id');
    }

    /**
     * Get the questionnaires for the course.
     */
    public function questionnaires()
    {
        return $this->hasMany('App\Models\Questionnaire', 'course_id');
    }

    /**
     * Get the instructor questionnaire for the course.
     */
    public function instructor_questionnaire()
    {
        return $this->belongsTo('App\Models\Questionnaire', 'instructor_quest_id');
    }

    /**
     * Get the trainee questionnaire for the course.
     */
    public function trainee_questionnaire()
    {
        return $this->belongsTo('App\Models\Questionnaire', 'trainee_quest_id');
    }



    public function getPassingScoreByFullScore($full_score)
    {
        return $this->pass_unit == 'n' ? $this->pass_grade : floor($this->pass_grade * $full_score / 100);
    }

    public function getLastQuestionnaireAttribute()
    {
        return $this->questionnaires()->where('publish_date', '<=', date("Y-m-d"))
            ->orderBy('publish_date', 'DESC')->first();
    }
}

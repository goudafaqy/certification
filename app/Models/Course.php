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
        return $this->belongsTo('App\User', 'instructor_id');
    }

    /**
     * Get the appointments for the course.
     */
    public function appointments()
    {
        return $this->hasMany('App\Models\CourseAppintment');
    }

    /**
     * Get the students for the course.
     */
    public function students()
    {
        return $this->belongsToMany('App\User', 'course_user');
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

    public function getPassingScoreByFullScore($full_score)
    {
        return $this->pass_unit == 'n' ? $this->pass_grade : floor($this->pass_grade * $full_score / 100);
    }
}

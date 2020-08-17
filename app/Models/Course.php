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
        'instructor_id',
        'class_id',
        'cat_id',
        'price',
        'discount',
        'type',
        'image',
        'seats',
        'created_at',
        'updated_at',
    ];

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

    public function getTitleAttribute(){
        return $this["title_".App::getLocale()];
    }
}

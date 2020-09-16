<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseRating extends Model
{

    protected $table = 'courses_ratings';

    protected $primaryKey = 'id';

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'review',
        'approved',
        'date',
        'rating',
        'user_id',
        'course_id',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the course that owns the appointment.
     */
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }


}

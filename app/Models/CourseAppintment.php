<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseAppintment extends Model
{

    protected $table = 'courses_appointments';

    protected $primaryKey = 'id';

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 
        'date', 
        'day', 
        'from_time', 
        'to_time', 
        'course_id'
    ];

    /**
     * Get the course that owns the appointment.
     */
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseUpdate extends Model
{

    protected $table = 'course_updates';

    protected $primaryKey = 'id';

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 
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

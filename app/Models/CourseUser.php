<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class CourseUser extends Authenticatable
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users_courses';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'national_id',
        'title',
        'phone','sex',
        'course'
    ];
    public function details()
    {
        return $this->belongsTo('App\Models\Course','course');
    }

}

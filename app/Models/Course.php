<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Course extends Authenticatable
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'courses';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'hours',
        'days',
        'date'
    ];


}

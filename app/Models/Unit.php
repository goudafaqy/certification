<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{

    protected $table = 'course_units';

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
        'type', 
        'section_id', 
        'duration', 
        'source_type',
        'text',
        'link',
        'created_at', 
        'updated_at',
    ];

   
}

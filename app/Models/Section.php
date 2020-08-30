<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

    protected $table = 'course_sections';

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
        'course_id',
        'created_at', 
        'updated_at',
    ];

    /**
     * Get the units for the course.
     */
    public function units()
    {
        return $this->hasMany('App\Models\Unit','section_id');
    }
    
}

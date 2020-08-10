<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{

    protected $table = 'course_materials';

    protected $primaryKey = 'id';

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_ar',
        'name_en',
        'type', 
        'source', 
        'status', 
        'course_id',
        'description',
        'created_at', 
        'updated_at',
    ];

    /**
     * Get the classifications for the category.
     */
    public function classifications()
    {
        return $this->hasMany('App\Models\Classification', 'cat_id');
    }

    /**
     * Get the courses for the category.
     */
    public function courses()
    {
        return $this->hasMany('App\Models\Course', 'cat_id');
    }
}

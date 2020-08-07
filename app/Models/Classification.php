<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{

    protected $table = 'classifications';

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
        'cat_id', 
        'created_at', 
        'updated_at',
    ];

    /**
     * Get the category that owns the classification.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'cat_id');
    }

    /**
     * Get the courses for the category.
     */
    public function courses()
    {
        return $this->hasMany('App\Models\Course');
    }
}

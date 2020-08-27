<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Category extends Model
{

    protected $table = 'categories';

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
        'letter',
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


    public function getTitleAttribute(){
        return $this["title_".App::getLocale()];
    }
}

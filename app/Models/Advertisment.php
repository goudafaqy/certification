<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisment extends Model
{

    protected $table = 'ads';

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
        'message_ar', 
        'message_en', 
        'date', 
        'image',
        'time',
        'location',
        'created_at', 
        'updated_at',
    ];

    
}

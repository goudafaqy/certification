<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationSetting extends Model
{

    protected $table = 'notificatins_settings';

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
        'message_ar',
        'message_en',
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
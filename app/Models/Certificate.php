<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Certificate extends Model
{

    protected $table = 'certificates';

    protected $primaryKey = 'id';

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name_ar',
        'user_name_en',
        'national_id',
        'course_name_ar',
        'course_name_en',
        'date',
        'hours',
        'certificate_key',
        'certificate_image',
        'printed'
    ];


}

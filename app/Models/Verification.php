<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Verification extends Authenticatable
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'verification';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'national_id',
        'code'
    ];


}

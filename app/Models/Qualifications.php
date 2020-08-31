<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qualifications extends Model
{
    protected $fillable=[
           "user_id",
            "type",
            "body",
    ];


    protected $table = 'instructor_qualifications';

    protected $primaryKey = 'id';

    public function user(){
        return $this->belongsTo(User::class);
    }

}

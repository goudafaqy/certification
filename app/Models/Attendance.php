<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable=[
        "course_id",
        "webinar_id",
        "user_id",
        "join_time"	,
        "leave_time",
        "duration",
        "attend"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function webinar(){
        return $this->belongsTo(Webinar::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }
}

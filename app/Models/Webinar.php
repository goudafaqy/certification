<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    protected $fillable =[
        "user_id",
        "uuid",
        "zoom_id",
        "host_id",
        "topic",
        "type",
        "start_time",
        "duration",
        "timezone",
        "agenda",
        "start_url",
        "join_url"
    ];
}

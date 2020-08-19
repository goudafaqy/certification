<?php

namespace App\Http\Controllers;

use App\Models\Notification;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    function add_notification($data){

        $notification = new Notification();
        $notification->title_ar = $data['title_ar'];
        $notification->title_en = $data['title_en'];
        $notification->message_ar = $data['message_ar'];
        $notification->message_en = $data['message_en'];
        $notification->type = $data['type'];
        $notification->user_id = $data['user_id'];
        $notification->is_read = 0;
        $notification->save();
    }
}

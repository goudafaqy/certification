<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\NotificationSetting;
use App\Models\Notification;
use App\Models\Course;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

class NotificationsController extends Controller
{
    var $validation;
    var $NotificationRepo;
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * List the application classification ...
     */
    public function Send_Notification_And_Email($data,  $type = '')
    {

                $notification = new Notification();
                $notification->title_ar = $data['title_ar'];
                $notification->title_en = $data['title_en'];
                $notification->message_ar = $data['message_ar'];
                $notification->message_en = $data['message_en'];
                $notification->type = $data['type'];
                $notification->user_id = $data['user_id'];
                $notification->link = $data['link'];
                $notification->extra_text = $data['extra_text'];
                $notification->is_read = 0;
                $notification->save();
                $email = new SendEmail($data , __('app.Adly Training Center') ,$data['title_ar'] ,  $type);
                Mail::to($data['email'])->send($email);

    }

    /**
     * List the application classification ...
     */
    public function SendNotificationToStudents($course, $data = [])
    {

                $evenMyMoreUsers = [];
                $students = Course::find($course)->students;
                $notification = new Notification();
                foreach($students as $student){

                    $evenMyMoreUsers[]      =   [$student->email];
                    $notification->title_ar =   $data['title_ar'];
                    $notification->title_en =   $data['title_en'];
                    $notification->message_ar = $data['message_ar'];
                    $notification->message_en = $data['message_en'];
                    $notification->type =       'info';
                    $notification->user_id =    $student->user_id;
                    $notification->link =       '';
                    $notification->extra_text = '';
                    $notification->is_read =    0;
                    $notification->save();

                }
                

                $email = new SendEmail($data , __('app.Adly Training Center') ,$data['title_ar'] ,  'Notify_Students');
                Mail::to([])->bcc($evenMyMoreUsers)->send($email);

    }

}

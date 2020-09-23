<?php


namespace App\Http\Repositories\Eloquent;


use App\Http\Interfaces\Eloquent\WebinarEloquent;
use App\Models\Webinar;
use MacsiDigital\Zoom\Facades\Zoom;

class WebinarRepo extends Repository implements WebinarEloquent
{
    public function __construct()
    {
        parent::__construct(new Webinar());
    }

    public function save($inputs, $getId = false)
    {
        $user = auth()->user();
        //$user->zoom_id
        //every admin must have a zoom_id but because we just have one licenced webinar user we gonna hard coded it
        $webinar = Zoom::user()->find('XHSU_y9HQlmsgFpLvm74AQ')->webinars()->create([
            "topic"=>$inputs["topic"],
            "type"=> 5,
            "start_time"=>$inputs["start_time"],
            "duration"=>$inputs["duration"],
            "timezone"=>"Asia/Riyadh",
            "agenda"=>$inputs["agenda"],
            "settings"=> [
                "host_video"=> true,
                "panelists_video"=> true,
                "practice_session"=> true,
                "hd_video" => true,
                "approval_type"=> 0,
                "registration_type"=> 2,
                "audio"=> "both",
                "auto_recording"=> "none",
                "enforce_login"=> false,
                "close_registration"=> true,
                "show_share_button"=> true,
                "allow_multiple_devices"=> false,
                "registrants_email_notification"=> true
          ]

        ]);

        foreach ($inputs['students'] as $student){
            $registrant = $webinar->registrants()->create([
                'email'=> $student->email,
                'first_name'=> $student->name_en
            ]);
//            $webinar->registrants()->save($registrant);
        }


        $webinarArr = $webinar->toArray();

        $webinarArr["user_id"] = $user->id;
        $webinarArr["course_id"] = $inputs['course_id'];
        $webinarArr["course_appointments_id"] = $inputs['course_appointments_id'];
        $webinarArr["host_id"] = $webinar->user_id;
        $webinarArr["zoom_id"] =  $webinar->id;
        $webinarArr["start_time"] = date('Y-m-d', strtotime($webinarArr["start_time"]));

      return  Webinar::create($webinarArr);
    }
}

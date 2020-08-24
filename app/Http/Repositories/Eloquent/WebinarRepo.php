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
            "agenda"=>$inputs["agenda"]

        ]);

        foreach ($inputs->students as $student){
            $webinar->registrants()->save([
                'email'=> $student["email"],
                'first_name'=> $student["name_en"]
            ]);
        }


        $webinarArr = $webinar->toArray();

        $webinarArr["user_id"] = $user->id;
        $webinarArr["host_id"] = $webinar->user_id;
        $webinarArr["zoom_id"] =  $webinar->id;
        $webinarArr["start_time"] = date('Y-m-d', strtotime($webinarArr["start_time"]));

      return  Webinar::create($webinarArr);

    }
}

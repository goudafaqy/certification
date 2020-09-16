<?php


namespace App\Http\Helpers;


use App\Models\Attendance;
use App\Models\User;
use App\Models\Webinar;
use Carbon\Carbon;
use GuzzleHttp\Client;
use MacsiDigital\Zoom\Facades\Zoom;

class ZoomHelper
{

    public static function addUser($user){
        $firstName =  explode(" ",$user->name_en)[0];
        $lastName =  explode(" ",$user->name_en)[1];
        $zoomUser = Zoom::user()->create([
            "email"=>$user->email,
            "type"=> 2,
            "first_name"=>isset($firstName)?$firstName:'',
            "last_name"=>isset($lastName)?$lastName:'',
            "password"=>"123456789"
        ]);
        $user->zoom_id = $zoomUser->id;
        $user->save();

        return $zoomUser;
    }


    public static function getAttendeesReport($webinarId){

        try {
            $webinar = Webinar::find($webinarId);
            $token =   \MacsiDigital\API\Support\Authentication\JWT::generateToken(['iss' => config('zoom.api_key'), 'exp' => time() + config('zoom.token_life')], config('zoom.api_secret'));
            $client = new Client();
            $headers = [
                'Authorization' => 'Bearer ' . $token,
                'Accept'        => 'application/json',
            ];
            $response = $client->request('GET', 'https://api.zoom.us/v2/report/webinars/'.$webinar->zoom_id.'/participants?page_size=300',[
                'headers' => $headers
            ]);

            $data = $response->getBody()->getContents();
            $jsonResponse  = json_decode($data);
            foreach ($jsonResponse->participants as $participant){

                $user = User::where('email',$participant->user_email)->first();

                if ($user) {
                    Attendance::updateOrCreate([
                        'course_id' => $webinar->course_id,
                        'webinar_id' => $webinar->id,
                        'user_id' => $user->id
                    ], [
                        'join_time' => Carbon::createFromTimeString($participant->join_time)->format('Y-m-d H:i:s'),
                        'leave_time' => Carbon::createFromTimeString($participant->leave_time)->format('Y-m-d H:i:s'),
                        'duration' => $participant->duration,
                        'attend'=>1
                    ]);

                }
            }
        }catch (\Exception $e){

        }


    }

}

<?php


namespace App\Http\Helpers;


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


}

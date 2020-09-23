<?php
namespace App\Http\Helpers;

use BigBlueButton\Parameters\CreateMeetingParameters;

class BBBHelper{

    private static function ISConnect(){
        return \Bigbluebutton::isConnect();
    } 
    public static function createMetting($meeting_id,$meeting_name,$duration){
        $createMeeting = \Bigbluebutton::initCreateMeeting([
            'meetingID' => $meeting_id,
            'meetingName' => $meeting_name,
            'attendeePW' => 'attendeejtc',
            'moderatorPW' => 'moderatorjtc',
        ]);
        
        $createMeeting->setDuration($duration); 
        return \Bigbluebutton::create($createMeeting);
        
    }
    public static function joinMeeting($meeting_id,$userID,$fullName,$as){
        $password="Trainer";
        if($as=="Trainer")
          $password='moderatorjtc';
        else if($as=="Trainee")
          $password='attendeejtc';
         
          if(!Self::ISConnect()) return false;
          $JoinUrl=  \Bigbluebutton::join([
                        'meetingID' => $meeting_id,
                        'userID'=>$userID,
                        'userName' => $fullName,
                        'password' => $password //which user role want to join set password here
                    ]);
        return $JoinUrl;
    } 
    public static function getMeetingInfo($meeting_id){
        if(!Self::ISConnect()) return false;
        $meeting=\Bigbluebutton::getMeetingInfo([
            'meetingID' => $meeting_id,
            'moderatorPW' => 'moderatorjtc' //moderator password set here
        ]);
        return $meeting;
    } 
    public static function IsMeetingRunning($meeting_id){
        if(!Self::ISConnect()) return false;
        return \Bigbluebutton::isMeetingRunning([
            'meetingID' => $meeting_id,
        ]);
    }
    public static function closeMeeting($meeting_id){
        if(!Self::ISConnect()) return false;
        return \Bigbluebutton::close([
            'meetingID' => $meeting_id,
            'moderatorPW' => 'moderatorjtc' //moderator password set here
        ]);
    }
    public static function StartMeeting($meeting_id,$fullName,$UserID){
        if(!Self::ISConnect()) return false;
        $url = \Bigbluebutton::start([
             'meetingID' => $meeting_id,
             'moderatorPW' => 'moderatorjtc', //moderator password set here
             'attendeePW' => 'attendeejtc', //attendee password here
             'userName'=>$fullName,
             'UserID'=>$UserID,
             'redirect' => true
        ]);
        return $url;
        //return redirect()->to($url);
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\NotificationSetting;
use App\Models\Notification;
use App\Models\Course;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use Auth;

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


    public function read(Request $request)
    {
            $user = Auth::user()->id;
            Notification::where('user_id',$user)->update(['is_read'=>1]);
            return response()->json(['data' => [],'status'=>'true','message'=>'']); 
    }

    public function userNotifications(Request $request)
    {
        
            $role = Auth::user()->roles ? Auth::user()->roles[0] : null;
            $user = Auth::user()->id;
            $notificationsObj = Notification::where('user_id',$user)->get();
            $notifications = [];
            foreach ($notificationsObj as  $value) {
                $notifications[] = [
                    'id'=>$value->id ,
                    'title'=> $value->title_ar ,
                    'message'=> $value->message_ar,
                    'type'=> $value->type,
                    'date' => $this->dateDiff($value->created_at),
                    'read' => $value->is_read,
                    
                ];
            }
            return view("cp.notifications.userlist", ['notifications' => $notifications, 'rolename'=>$role->name]);


    }


    public function dateDiff($date){

            $date1 =  strtotime($date);  
            $date2 = strtotime('now');  
            $diff = abs($date2 - $date1);  
            $years = floor($diff / (365*60*60*24));  
            $months = floor(($diff - $years * 365*60*60*24) 
                                        / (30*60*60*24));  
            $days = floor(($diff - $years * 365*60*60*24 -  
                        $months*30*60*60*24)/ (60*60*24)); 
            $hours = floor(($diff - $years * 365*60*60*24  
                - $months*30*60*60*24 - $days*60*60*24) 
                                            / (60*60));  
                                            
            $minutes = floor(($diff - $years * 365*60*60*24  
                    - $months*30*60*60*24 - $days*60*60*24  
                                    - $hours*60*60)/ 60);  
            $seconds = floor(($diff - $years * 365*60*60*24  
                    - $months*30*60*60*24 - $days*60*60*24 
                            - $hours*60*60 - $minutes*60));  

            $string = ' ';                
            if($days != 0){
                $string.= '  منذ  ' .$days . ' ايام ';
            }
            if( $days <= 0 && $hours >= 1){
                $string.= '  منذ  ' .$hours . ' ساعات ';
            }
            if($days <= 0 && $hours <= 0){
                $string.= '  منذ  ' .$minutes . ' دقائق ';
            }
            if($days <= 0 && $hours <= 0 && $minutes < 5  ){
                $string.= '  منذ  ' . $seconds  .' ثوانى ';
            }
            return $string;          



}

}

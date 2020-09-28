<?php 

namespace App\Http\Helpers;

use App\Models\Notification;
use App\Models\Course;
use App\Models\User;

use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;


class GenerateHelper{

    public static function generateCourseCode($id, $categoryLetter, $version){
        $prefix = "JTC";
        $higri = "42"; // To do automatically ...
        return $prefix . "-" . $categoryLetter . $higri . $id . "_" . $version;
    }



    public static function SendNotificationToStudents($course_id, $type, $resource = null,  $input = [], $students = [] )
    {

                $Mails = [];
                $course = Course::find($course_id);
                
                switch ($type) {
                    case 'file':
                        $data = ['title_ar' =>'  تم اضافة ملف جديد لدورة  '. $course->title_ar   ,
                                 'title_en' => ' New file added to course '.$course->title_en,
                                 'message_ar'=> '  .تم أضافة ملف  <strong> ' . $resource->name_ar .' </strong> لدورة  <strong> '. $course->title_ar .' </strong>',
                                 'message_en' => 'New file added to course '.$course->title_en];
                        break;
                    case 'certificate':
                            $data = ['title_ar' =>   ' تم استخراج الشهادة الخاصة بدورة   '.  $course->title_ar ,
                                     'title_en' => ' New certificate added to course '.$course->title_en,
                                     'message_ar'=> '  تم استخراج  الشهادة الخاصة  بدورة  <strong> '. $course->title_ar .' </strong>',
                                     'message_en' => 'New file added to course '.$course->title_en];
                    break;
                    case 'assignment':
                        $data = ['title_ar' =>   ' تم اضافة  واجب جديد لدورة    '.  $course->title_ar ,
                                 'title_en' => ' New  assignment added to course '.$course->title_en,
                                 'message_ar'=> '  تم اضافة  واجب جديد لدورة  <strong> '. $course->title_ar .' </strong>',
                                 'message_en' => 'New assignment added to course '.$course->title_en];
                    break;
                    case 'exam':
                        $data = ['title_ar' =>   ' تم اضافة  امتحان  جديد لدورة  '.  $course->title_ar ,
                                 'title_en' => ' New exam added to course '.$course->title_en,
                                 'message_ar'=> '  تم اضافة  امتحان  جديد لدورة  <strong> '. $course->title_ar .' </strong>',
                                 'message_en' => 'New exam added to course '.$course->title_en];
                    break;
                    case 'sendmail':
                        $data = ['title_ar' =>   $input['title_ar'],
                                 'title_en' =>   $input['title_en'],
                                 'message_ar'=>  $input['message_ar'],
                                 'message_en' => $input['message_en'] ];
                    break;
                    default:
                        # code...
                        break;
                }
                if(!empty($students)){
                    $students = User::whereIn('id', $students)->get();
                }else{
                    $students = Course::find($course_id)->students;
                }
                $notification = new Notification();
                foreach($students as $student){

                    //if(!$email_only){

                        $notification->title_ar =   $data['title_ar'];
                        $notification->title_en =   $data['title_en'];
                        $notification->message_ar = $data['message_ar'];
                        $notification->message_en = $data['message_en'];
                        $notification->type =       'info';
                        $notification->user_id =    $student->id;
                        $notification->link =       '';
                        $notification->extra_text = '.ادخل الى الحساب الخاص بك لمزيد من التفاصيل ';
                        $notification->is_read =    0;
                        $notification->save();
                        
                    //}
                   
                    $Mails[]      =   $student->email;
                }
                $Mails = implode(","  ,$Mails);
                $Mails = explode(',', $Mails);
                $email = new SendEmail($notification, __('app.Adly Training Center'), $data['title_ar'],  'Notify_Students');
                $Mailer=Mail::to([])->bcc($Mails);
                $Mailer->send($email);
    }

}
<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Eloquent\CourseRepo;
use App\Http\Repositories\Eloquent\CourseUpdateRepo;
use App\Http\Repositories\Eloquent\UserRepo;
use Illuminate\Http\Request;
use App\Http\Helpers\GenerateHelper;

class CourseTrainesController extends Controller
{
    var $courseRepo;
    var $userRepo;
    var $courseUpdateRepo;

  
    public function __construct(
        CourseRepo $courseRepo,
        UserRepo $userRepo,
        CourseUpdateRepo $courseUpdateRepo
    )
    {
        $this->courseRepo = $courseRepo;
        $this->userRepo = $userRepo;
        $this->courseUpdateRepo = $courseUpdateRepo;
        $this->middleware(['auth', 'authorize.instructor']);
    }

  
    public function send_email_students(Request $request)
	{
		$inputs = ['title_ar'=>$request->subject, 'title_en'=>'' ,'message_ar'=>$request->message, 'message_en' =>'' ];
        GenerateHelper::SendNotificationToStudents($request->course, 'sendmail', null, $inputs,$request->ids );
             return redirect()->back()->with('success', "تمت أرسال الرسالة الالكترونية الى الطلاب بنجاح");			
	}
}

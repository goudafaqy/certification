<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Eloquent\AdvertismentRepo;
use App\Http\Repositories\Validation\AdvertismentRepoValidation;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Helpers\FileHelper;
use Illuminate\Support\Facades\Mail;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\User;
use App\Models\CourseUser;

use App\Http\Helpers\GenerateHelper;
use Johntaa\Arabic\I18N_Arabic;
use App\Mail\SendEmail;

class CertificatesController extends Controller
{
    var $validation;
    var $AdvertismentRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(

        AdvertismentRepoValidation $validation,
        AdvertismentRepo $AdvertismentRepo
    )
    {
        $this->validation = $validation;
        $this->AdvertismentRepo = $AdvertismentRepo;
		$this->middleware(['auth', 'authorize.instructor']);

    }

    /**
     * List the application classification ...
     */
    public function certificates()
    {

        // $data = ['title_ar' => 'Sending Multiple Emails','message_ar'=>'Sending Multiple Emails','link'=>'lin','extra_text'=>''];
        // $email = new SendEmail($data , __('app.Adly Training Center') ,$data['title_ar'] ,  'Generic');
        // $evenMyMoreUsers = ['mohgood2020@gmail.com','devmogoud@gmail.com'];
        // Mail::to([])
        // ->bcc($evenMyMoreUsers)
		// ->send($email);
		// die('Sending');
		$data =['name_ar'=>'   محمد محمد محمود ابوالجود',
				 'name_en'=>'',
				 'national_id'=>'19872200552',
				 'course_ar'=>'أساسيات وسائل التواصل الاجتماعي',
				 'course_en'=>'',
				 'hours'=>'65',
				 'date'=>date('Y-M-d')];

				 //$start = \Carbon\Carbon::createFromTimeString(date('Y-m-d H:i:s'));
				 $start = \Alkoumi\LaravelHijriDate\Hijri::DateMediumFormat('ar',\Carbon\Carbon::createFromTimeString(date('Y-m-d H:i:s')));
				 dd($start);
		$this->generate($data);
        
    }


	 /**
     * Generate Full Certificates
     */
    public function generate($data)
    {
		
		$Arabic = new I18N_Arabic('Glyphs'); 
       
		$nameAR = $Arabic->utf8Glyphs($data['name_ar']); 
		$courseAR = $Arabic->utf8Glyphs($data['course_ar']); 
		$img = Image::make(public_path('images/certificate.jpeg')); 
		$hourse = $Arabic->utf8Glyphs(' ساعة '); 
		$date = \Alkoumi\LaravelHijriDate\Hijri::DateMediumFormat('en',\Carbon\Carbon::createFromTimeString(date('Y-m-d H:i:s', strtotime($data['date']))));
		$date = $Arabic->utf8Glyphs($date); 

		// Name
        $img->text($nameAR, 880, 280, function($font) {  
           $font->file(public_path('fonts/ae_AlHor.ttf'));  
           $font->size(28);  
           $font->color('#000000');  
           $font->align('center');  
           $font->valign('bottom');  
           $font->angle(0);  
       });  

       $img->text($data['name_en'], 270, 280, function($font) {  
			$font->file(public_path('fonts/arial.ttf'));  
			$font->size(20);  
			$font->color('#000000');  
			$font->align('center');  
			$font->valign('bottom');  
			$font->angle(0);  
	   });  


	  // ID 
	  $img->text($data['national_id'], 850, 320, function($font) {  
		$font->file(public_path('fonts/arial.ttf'));  
		$font->size(25);  
		$font->color('#000000');  
		$font->align('center');  
		$font->valign('bottom');  
		$font->angle(0);  
	  });  

	   // Course 
      $img->text($courseAR, 765, 375, function($font) {  
		$font->file(public_path('fonts/ae_AlHor.ttf'));  
		$font->size(27);  
		$font->color('#000000');  
		$font->align('center');  
		$font->valign('bottom');  
		$font->angle(0);  
	  });  
	  
	  $img->text($data['course_en'], 500, 363, function($font) {  
		$font->file(public_path('fonts/arial.ttf'));  
		$font->size(20);  
		$font->color('#000000');  
		$font->align('center');  
		$font->valign('bottom');  
		$font->angle(0);  
	  });  
	  
	  // Date 
	  $img->text($date, 800, 425, function($font) {  
		$font->file(public_path('fonts/ae_AlHor.ttf'));  
		$font->size(24);  
		$font->color('#000000');  
		$font->align('center');  
		$font->valign('bottom');  
		$font->angle(0);  
	  });  



	  // Hours 
	  $img->text($hourse.' '.$data['hours'], 840, 460, function($font) {  
		$font->file(public_path('fonts/ae_AlHor.ttf'));  
		$font->size(22);  
		$font->color('#000000');  
		$font->align('center');  
		$font->valign('bottom');  
		$font->angle(0);  
	  });  
	  $fileName = "certifcate".time();
	  $img->save(public_path('uploads/certifcates/'.$fileName.'.jpg'));  
	  $certificateUser = CourseUser::where('course_id', $data['course_id'])->where('user_id',  $data['user_id'])->first();
	  $certificateUser->certifcate = 1;
	  $certificateUser->save();
	  sleep(2);
	  $certificate = new Certificate();
	  $certificate->user_name_ar  = $data['name_ar'];
	  $certificate->user_name_en  = $data['name_en'];
	  $certificate->national_id  = $data['national_id'];
	  $certificate->course_name_ar  = $data['course_ar'];
	  $certificate->course_name_en  = $data['course_en'];
	  $certificate->course_id  =     $data['course_id'];
	  $certificate->date  = $data['date'];
	  $certificate->hours  = $data['hours'];
	  $certificate->printed  = 0;
	  $certificate->user_id  = $data['user_id'];
	  $certificate->certificate_key  = $this->_generateRandomString(10);
	  $certificate->certificate_image  = 'uploads/certifcates/'.$fileName.'.jpg';
	  $certificate->save();
    }

	public function send_email_students(Request $request)
	{
		$inputs = ['title_ar'=>$request->subject, 'title_en'=>'' ,'message_ar'=>$request->message, 'message_en' =>'' ];
		GenerateHelper::SendNotificationToStudents($request->course, 'sendmail', null, $inputs,$request->ids );

	}

    /**
     * Save classification date ...
     */
    public function generate_certificates(Request $request)
    {
		$inputs = $request->input();
		$course  = Course::find($inputs['course']);
		$ids = $inputs['ids'];
		if(!empty($ids)){
			for ($i=0; $i <count($ids) ; $i++) { 
			
				$user = User::find($ids[$i]);
				$certificate = CourseUser::where('course_id', $course->id)
				 						   ->where('user_id',  $user->id)->first();
				if($certificate->certifcate == 0){

					$data['name_ar'] = $user->name_ar; 
					$data['name_en'] = $user->name_en;
					$data['user_id'] = $user->id;
					$data['national_id'] = $user->national_id;
					$data['course_ar'] = $course->title_ar;
					$data['course_en'] = $course->title_en;
					$data['date'] = $course->start_date;
					$data['hours'] = $course->course_hours;
					$data['course_id'] = $course->id;
					$this->generate($data);
					unset($data);
					unset($user);
				
				 }
				// unset($certificate);

			}
			GenerateHelper::SendNotificationToStudents($course->id, 'certificate');
			 
		}else{
			return false;

		}
        
    }


    public function _generateRandomString($length)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }



}

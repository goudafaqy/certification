<?php

namespace App\Http\Controllers;
use App\Http\Repositories\Eloquent\AdvertismentRepo;
use App\Http\Repositories\Validation\AdvertismentRepoValidation;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Helpers\FileHelper;
use Illuminate\Support\Facades\Mail;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\User;

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
        $this->middleware('auth');
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
	  $img->text($data['date'], 850, 425, function($font) {  
		$font->file(public_path('fonts/arial.ttf'));  
		$font->size(22);  
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

	  $certificate = new Certificate();
	  $certificate->user_name_ar  = $data['name_ar'];
	  $certificate->user_name_en  = $data['name_en'];
	  $certificate->national_id  = $data['national_id'];
	  $certificate->course_name_ar  = $data['course_ar'];
	  $certificate->course_name_en  = $data['course_en'];
	  $certificate->date  = $data['date'];
	  $certificate->hours  = $data['hours'];
	  $certificate->printed  = 0;
	  $certificate->user_id  = $data['user_id'];
	  $certificate->certificate_key  = $this->_generateRandomString(10);
	  $certificate->certificate_image  = 'uploads/certifcates/'.$fileName.'.jpg';
	  $certificate->save();
    }



    /**
     * Save classification date ...
     */
    public function generate_certificates(Request $request)
    {
		$inputs = $request->input();
		$course  = Course::find($inputs['course']);
		if(isset($inputs['ids'])){
			foreach($inputs['ids'] as $id){

				$user = User::find($id);
				$data = [];
				$data['name_ar'] = $user->name_ar; 
				$data['name_en'] = $user->name_en;
				$data['user_id'] = $id;
				$data['national_id'] = $user->national_id;
				$data['course_ar'] = $course->title_ar;
				$data['course_en'] = $course->title_en;
				$data['date'] = $course->start_date;
				$data['hours'] = $course->course_hours;
				$this->generate($data);

			}
		
		      return redirect()->back()->with('added', 'تم استخراج وتخزين الشهادات الخاصة بهذة الدورة');
		}else{
			 return redirect()->back()->with('error', 'لابد من أختيار الطلبة');

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

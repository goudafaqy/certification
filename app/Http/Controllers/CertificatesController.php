<?php

namespace App\Http\Controllers;
use App\Http\Repositories\Eloquent\AdvertismentRepo;
use App\Http\Repositories\Validation\AdvertismentRepoValidation;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Helpers\FileHelper;
use Illuminate\Support\Facades\Mail;
use App\Models\Newsletter;
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
		$hourse = $Arabic->utf8Glyphs('ساعة '); 
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
	  $name = "certifcate".time();
	  $img->save(public_path('certifcates/'.$name.'.jpg'));  
	   
    }

    /**
     * Get add classification page ...
     */
    public function add()
    {
        $item = new $this->AdvertismentRepo();
        $title = __('app.New Advertisment'); 
        $route = route('save-advertisments');
        return view("cp.advertisments.form", [ 'route'=>$route ,
        'title'=>$title ,'item' => $item ]);
    }


    /**
     * Save classification date ...
     */
    public function create(Request $request)
    {
        $inputs = $request->input();
        $this->add_notify( $inputs, 'Advertisments');
        $inputs['created_by'] = \Auth::user()->id;
        $validator = $this->validation->doValidate($inputs, 'insert');
        $validatedData = $request->validate([
            'image' => 'required'
        ]);

        if ($validator->fails()) {
            
            return redirect('advertisments/add')->withErrors($validator)->withInput();
        }else{
            
            if($request->file('image') == null) {
            
                    return redirect('advertisments/add')->withErrors('image')->withInput();

            }else{
                $filePath = FileHelper::uploadFiles($request->file('image'), 'uploads/advertisments/');
                $inputs['image'] = $filePath;
            }
           
            $item = $this->AdvertismentRepo->save($inputs);
            if($item){
                return redirect('advertisments')->with('added', __('app.Advertisment Added Successfully'));
            }
        }
    }


    /**
     * Get update classification page ...
     */
    public function update($id)
    {
        $item = $this->AdvertismentRepo->getById($id);
        $route = route('update-advertisments',['id'=>$id]);
        $title = __('app.Update Advertisment'); 
        return view("cp.advertisments.form", ['item' => $item  , 'route' => $route, 'title' =>  $title ]);
    }

    /**
     * Update classification date ...
     */
    public function edit(Request $request)
    {
        $inputs = $request->input();

        $validator = $this->validation->doValidate($inputs, 'update');     
        if ($validator->fails()) {
            return redirect('advertisments/update/'.$inputs['id'])->withErrors($validator)->withInput();
        }else{
            if($request->file()) {
                $filePath = FileHelper::uploadFiles($request->file('image'), 'uploads/advertisments/');
                $inputs['image'] = $filePath;
            }
            unset($inputs['_token']);
            $advertisment = $this->AdvertismentRepo->update($inputs, $inputs['id']);
            if($advertisment){
                return redirect('advertisments')->with('updated', __('app.Advertisment Updated Successfully'));
            }
        }
    }


    /**
     * Delete classification date ...
     */
    public function delete($id)
    {
        $result = $this->AdvertismentRepo->delete($id);
        if($result){
            return redirect('advertisments')->with('deleted', __('app.Advertisment Deleted Successfully'));
        }
    }

    function add_notify($data){


        $users = Newsletter::get();
        foreach( $users as $user){

            $data_Advertisments = [

                'title_ar'=>     $data['title_ar'],
                'title_en'=>     $data['title_en'],
                'message_ar'=>   $data['message_ar'],
                'message_en'=>   $data['message_en'],
                'user_id'=>      $user->id,
                'type'=>         'info',
                'name'=>         '',
                'email'=>        $user->email,
                'link' =>        '',
                'extra_text'=>   ''
                
            ];
            $not = new NotificationsController();
            $not->Send_Notification_And_Email($data_Advertisments, 'advertisment_notification');
        }

        
    }


    function word2uni($word)
    {

        $new_word = array();
	$char_type = array();
	$isolated_chars = array('ا', 'د', 'ذ', 'أ', 'آ', 'ر', 'ؤ', 'ء', 'ز', 'و', 'ى', 'ة');

	$all_chars = array
		(
			'ا' => array(

				'middle'		=>   'ﺎ',

				'isolated'		=>   'ﺍ'
				),

			'ؤ' => array(

				'middle'		=>   'ﺅ',

				'isolated'		=>   'ﺆ'
				),
			'ء' => array(
				'middle'		=>   'ﺀ',
				'isolated'		=>   'ﺀ'
				),
			'أ' => array(

				'middle'		=>   'ﺄ',

				'isolated'		=>   'ﺃ'
				),
			'آ' => array(

				'middle'		=>   'ﺂ',

				'isolated'		=>   'ﺁ'
				),
			'ى' => array(

				'middle'		=>   'ﻰ',

				'isolated'		=>   'ﻯ'
				),
			'ب' => array(
				'beginning'		=>   'ﺑ',
				'middle'		=>   'ﺒ',
				'end'			=>   'ﺐ',
				'isolated'		=>   'ﺏ'
				),
			'ت' => array(
				'beginning'		=>   'ﺗ',
				'middle'		=>   'ﺘ',
				'end'			=>   'ﺖ',
				'isolated'		=>   'ﺕ'
				),
			'ث' => array(
				'beginning'		=>   'ﺛ',
				'middle'		=>   'ﺜ',
				'end'			=>   'ﺚ',
				'isolated'		=>   'ﺙ'
				),
			'ج' => array(
				'beginning'		=>   'ﺟ',
				'middle'		=>   'ﺠ',
				'end'			=>   'ﺞ',
				'isolated'		=>   'ﺝ'
				),
			'ح' => array(
				'beginning'		=>   'ﺣ',
				'middle'		=>   'ﺤ',
				'end'			=>   'ﺢ',
				'isolated'		=>   'ﺡ'
				),
			'خ' => array(
				'beginning'		=>   'ﺧ',
				'middle'		=>   'ﺨ',
				'end'			=>   'ﺦ',
				'isolated'		=>   'ﺥ'
				),
			'د' => array(
				'middle'		=>   'ﺪ',
				'isolated'		=>   'ﺩ'
				),
			'ذ' => array(
				'middle'		=>   'ﺬ',
				'isolated'		=>   'ﺫ'
				),
			'ر' => array(
				'middle'		=>   'ﺮ',
				'isolated'		=>   'ﺭ'
				),
			'ز' => array(
				'middle'		=>   'ﺰ',
				'isolated'		=>   'ﺯ'
				),
			'س' => array(
				'beginning'		=>   'ﺳ',
				'middle'		=>   'ﺴ',
				'end'			=>   'ﺲ',
				'isolated'		=>   'ﺱ'
				),
			'ش' => array(
				'beginning'		=>   'ﺷ',
				'middle'		=>   'ﺸ',
				'end'			=>   'ﺶ',
				'isolated'		=>   'ﺵ'
				),
			'ص' => array(
				'beginning'		=>   'ﺻ',
				'middle'		=>   'ﺼ',
				'end'			=>   'ﺺ',
				'isolated'		=>   'ﺹ'
				),
			'ض' => array(
				'beginning'		=>   'ﺿ',
				'middle'		=>   'ﻀ',
				'end'			=>   'ﺾ',
				'isolated'		=>   'ﺽ'
				),
			'ط' => array(
				'beginning'		=>   'ﻃ',
				'middle'		=>   'ﻄ',
				'end'			=>   'ﻂ',
				'isolated'		=>   'ﻁ'
				),
			'ظ' => array(
				'beginning'		=>   'ﻇ',
				'middle'		=>   'ﻈ',
				'end'			=>   'ﻆ',
				'isolated'		=>   'ﻅ'
				),
			'ع' => array(
				'beginning'		=>   'ﻋ',
				'middle'		=>   'ﻌ',
				'end'			=>   'ﻊ',
				'isolated'		=>   'ﻉ'
				),
			'غ' => array(
				'beginning'		=>   'ﻏ',
				'middle'		=>   'ﻐ',
				'end'			=>   'ﻎ',
				'isolated'		=>   'ﻍ'
				),
			'ف' => array(
				'beginning'		=>   'ﻓ',
				'middle'		=>   'ﻔ',
				'end'			=>   'ﻒ',
				'isolated'		=>   'ﻑ'
				),
			'ق' => array(
				'beginning'		=>   'ﻗ',
				'middle'		=>   'ﻘ',
				'end'			=>   'ﻖ',
				'isolated'		=>   'ﻕ'
				),
			'ك' => array(
				'beginning'		=>   'ﻛ',
				'middle'		=>   'ﻜ',
				'end'			=>   'ﻚ',
				'isolated'		=>   'ﻙ'
				),
			'ل' => array(
				'beginning'		=>   'ﻟ',
				'middle'		=>   'ﻠ',
				'end'			=>   'ﻞ',
				'isolated'		=>   'ﻝ'
				),
			'م' => array(
				'beginning'		=>   'ﻣ',
				'middle'		=>   'ﻤ',
				'end'			=>   'ﻢ',
				'isolated'		=>   'ﻡ'
				),
			'ن' => array(
				'beginning'		=>   'ﻧ',
				'middle'		=>   'ﻨ',
				'end'			=>   'ﻦ',
				'isolated'		=>   'ﻥ'
				),
			'ه' => array(
				'beginning'		=>   'ﻫ',
				'middle'		=>   'ﻬ',
				'end'			=>   'ﻪ',
				'isolated'		=>   'ﻩ'
				),
			'و' => array(
				'middle'		=>   'ﻮ',
				'isolated'		=>   'ﻭ'
				),
			'ي' => array(
				'beginning'		=>   'ﻳ',
				'middle'		=>   'ﻴ',
				'end'			=>   'ﻲ',
				'isolated'		=>   'ﻱ'
				),
			'ئ' => array(
				'beginning'		=>   'ﺋ',
				'middle'		=>   'ﺌ',
				'end'			=>   'ﺊ',
				'isolated'		=>   'ﺉ'
				),
			'ة' => array(
				'middle'		=>   'ﺔ',
				'isolated'		=>   'ﺓ'
				)
		);

	if(in_array($word[0].$word[1], $isolated_chars))
	{
		$new_word[] = $all_chars[$word[0].$word[1]]['isolated'];
		$char_type[] = 'not_normal';
	}
	else
	{
		$new_word[] = $all_chars[$word[0].$word[1]]['beginning'];
		$char_type[] = 'normal';
	}

	if(strlen($word) > 4)
	{
		if($char_type[0] == 'not_normal')

		{
			if(in_array($word[2].$word[3], $isolated_chars))
			{
				$new_word[] = $all_chars[$word[2].$word[3]]['isolated'];
				$char_type[] = 'not_normal';
			}
			else
			{

				$new_word[] = $all_chars[$word[2].$word[3]]['beginning'];
				$char_type[] = 'normal';
			}
		}
		else
		{
			$new_word[] = $all_chars[$word[2].$word[3]]['middle'];
			$chars_statue[] = 'middle';

			if(in_array($word[2].$word[3], $isolated_chars))
			{
				$char_type[] = 'not_normal';
			}
			else
			{
				$char_type[] = 'normal';
			}
		}
		$x = 4;
	}
	else
	{
		$x = 2;	
	}

	for($x=4;$x< (strlen($word)-4) ;$x++)
	{
		if($char_type[count($char_type)-1] == 'not_normal' AND $x %2 == 0)
		{
			if(in_array($word[$x].$word[$x+1], $isolated_chars))
			{

				$new_word[] = $all_chars[$word[$x].$word[$x+1]]['isolated'];
				$char_type[] = 'not_normal';
			}
			else
			{

				$new_word[] = $all_chars[$word[$x].$word[$x+1]]['beginning'];
				$char_type[] = 'normal';
			}
		}
		elseif($char_type[count($char_type)-1] == 'normal' AND $x %2 == 0)
		{

			if(in_array($word[$x].$word[$x+1], $isolated_chars))
			{

				$new_word[] = $all_chars[$word[$x].$word[$x+1]]['middle'];
				$char_type[] = 'not_normal';
			}
			else
			{

				$new_word[] = $all_chars[$word[$x].$word[$x+1]]['middle'];
				$char_type[] = 'normal';
			}
		}

	}
	if(strlen($word)>6)
	{
		if($char_type[count($char_type)-1] == 'not_normal')
		{
			if(in_array($word[$x].$word[$x+1], $isolated_chars))
			{

				$new_word[] = $all_chars[$word[$x].$word[$x+1]]['isolated'];
				$char_type[] = 'not_normal';
			}
			else
			{

				if($word[strlen($word)-2].$word[strlen($word)-1] == 'ء')
				{
					$new_word[] = $all_chars[$word[$x].$word[$x+1]]['isolated'];
					$char_type[] = 'normal';
				}
				else
				{
					$new_word[] = $all_chars[$word[$x].$word[$x+1]]['beginning'];
					$char_type[] = 'normal';
				}

			}

			$x += 2;
		}
		elseif($char_type[count($char_type)-1] == 'normal')
		{

			if(in_array($word[$x].$word[$x+1], $isolated_chars))
			{

				$new_word[] = $all_chars[$word[$x].$word[$x+1]]['middle'];
				$char_type[] = 'not_normal';
			}
			else
			{

				$new_word[] = $all_chars[$word[$x].$word[$x+1]]['middle'];
				$char_type[] = 'normal';
			}

			$x += 2;
		}


	}

	if($char_type[count($char_type)-1] == 'not_normal')
	{

		if(in_array($word[$x].$word[$x+1], $isolated_chars))
		{		

			$new_word[] = $all_chars[$word[$x].$word[$x+1]]['isolated'];

		}
		else
		{
			$new_word[] = $all_chars[$word[$x].$word[$x+1]]['isolated'];

		}

	}
	else
	{
		if(in_array($word[$x].$word[$x+1], $isolated_chars))
		{

			$new_word[] = $all_chars[$word[$x].$word[$x+1]]['middle'];

		}
		else
		{

			$new_word[] = $all_chars[$word[$x].$word[$x+1]]['end'];

		}
	}

	return implode('',array_reverse($new_word));


    }

}

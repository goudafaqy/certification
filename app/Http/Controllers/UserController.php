<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseUser;
use App\Models\User;
use App\Models\Verification;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Mail;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function admin_login(Request $request)
    {
        if( session()->has('user')){
            return redirect('/');
        }
        $inputs = $request->input();

	   // admin login		
		$loginEmail=$inputs['national_id'];
		$loginpassword=$inputs['password']; 
		
		//dump($inputs);
		$admin=array();
		$admin['husamsf@moj.gov.sa']=array("password"=>"123678", "name"=>"حسام الزهراني");
		$admin['aaaqarrni@moj.gov.sa']=array("password"=>"125678", "name"=>"عائض القرني");
		$admin['jibrinma@moj.gov.sa']=array("password"=>"123688", "name"=>"محمد الجبرين");
		$admin['oshanqiti@moj.gov.sa']=array("password"=>"122678", "name"=>"عمر الشنقيطي");
		 
		foreach($admin as $mail=>$details){
			 if(trim($loginEmail)==trim($mail)){
				 if($loginpassword==$details['password']){
					  $request->session()->flash('sucess', 'تم الدخول بنجاح');
                      session(['user' => $details['name']]);
		              return redirect('/importExportView');
				 }
				 else
				     return redirect('admin_login')->with('error', 'بيانات غير صحيحة');
			 }
				 
		 }
	}
    public function login(Request $request)
    {
        if( session()->has('user')){
            return redirect('/');
        }
        $inputs = $request->input();
       	
        $user = CourseUser::where('national_id',$inputs['national_id'])->first();
        if($user){

            
            Verification::where('national_id', $inputs['national_id'])->delete();
            $ver = new Verification();
            $code = $this->verficationCode(6);
            $ver->email = $user->email;
            $ver->national_id = $inputs['national_id'];
            $ver->code = $code;
            $ver->save();
           
		   $data['name']=$user->name;
		   $data['title']=$user->title;
		   $data['code']=$code;
		   
           
            
            session(['email' => $user->email]);
            $email = new EmailVerification($data , 'مركز التدريب العدلى' ,'رمز التحقق الخاص بك');
            Mail::to($user->email)->send($email);
           
            // if( $user->generated == null || $user->generated == 0){

            //     $data = ['name_ar' => $user->name, 'national_id'=>$user->national_id];
            //     $inst = new MainController();
            //     $inst->generate($data);
            // }
            return redirect('verificationForm')->with('success',"تم أرسال رمز الى  بريدك الالكترونى التالى يرجى التحقق وادخال الرمز لاستكمال عملية الدخول  ".$user->email);
        }else{
            return redirect('login')->with('error', 'لا يوجد بيانات لرقم الهوية');
        }
        
    }
    public function verificationForm()
    {
        return view('auth.verify',['email' => session()->get('email') ]);
    }
    public function verification(Request $request)
    {
        if( session()->has('user')){
            return redirect('/');
        }
        $inputs = $request->input();
        $verify = Verification::where('email',$inputs['email'])->where('code',$inputs['code'])->first();
        if($verify){
           $user = CourseUser::where('national_id',$verify->national_id)->first();

            $request->session()->flash('sucess', 'تم الدخول بنجاح');
            session(['national_id' => $verify->national_id,'user'=>$user]);
            return redirect('/');
        }else{
            return redirect('login')->with('error', 'لا يوجد بيانات لرقم الهوية');
        }
        
    }
    
    public function logoutAdmin(Request $request)
    {

        Auth::logout();
        return redirect('admin_login');

    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');

        return redirect('login');

    }

    public function verficationCode($length)
    {
        $characters = '123456789';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }

    
    public function list()
    {
        $items = User::all();
        return view('cp.users.list',['items'=>$items]);
    }

    public function add()
    {
        $items = User::all();
        return view('cp.users.form',['items'=>$items]);
    }


      /**
     * Save user date ...
     */
    public function create(Request $request)
    {
            $inputs = $request->input();
            $user = new User();
            $user->name =  $inputs['name_ar'];
            $user->email =  $inputs['email'];
            $user->phone =  $inputs['mobile'];
            $user->phone =  $inputs['mobile'];
            $user->password = $inputs['password'] = Hash::make($inputs['password']);
            unset($inputs['password_confirmation']);
            $userId = $user->save();
            if($userId){
                return redirect('users/list')->with('added', 'تمت إضافة المستخدم بنجاح');
            }
        
    }

    
    
}

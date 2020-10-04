<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseUser;
use App\Models\Verification;

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
        if($inputs['national_id'] =='admin' && $inputs['password'] =='jtc@training'){
            $request->session()->flash('sucess', 'تم الدخول بنجاح');
            session(['user' => $inputs['national_id']]);
            return redirect('/importExportView');
        }else{
            return redirect('admin_login')->with('error', 'بيانات غير صحيحة');
        }
    }
    public function login(Request $request)
    {
        if( session()->has('user')){
            return redirect('/');
        }
        $inputs = $request->input();
        // admin login
        if($inputs['national_id'] =='admin' && $inputs['password'] =='jtc@training'){
            $request->session()->flash('sucess', 'تم الدخول بنجاح');
            session(['user' => $inputs['national_id']]);
            return redirect('/importExportView');
        }

        $user = CourseUser::where('national_id',$inputs['national_id'])->first();
        if($user){

            
            Verification::where('national_id', $inputs['national_id'])->delete();
            $ver = new Verification();
            $code = $this->verficationCode(6);
            $ver->email = $user->email;
            $ver->national_id = $inputs['national_id'];
            $ver->code = $code;
            $ver->save();
           
            session(['email' => $user->email]);
            $email = new EmailVerification($code , 'مركز التدريب العدلى' ,'تأكيد الحساب الخاص بك');
            Mail::to($user->email)->send($email);
           
            // if( $user->generated == null || $user->generated == 0){

            //     $data = ['name_ar' => $user->name, 'national_id'=>$user->national_id];
            //     $inst = new MainController();
            //     $inst->generate($data);
            // }
            return redirect('verificationForm');
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
           
            $request->session()->flash('sucess', 'تم الدخول بنجاح');
            session(['national_id' => $verify->national_id]);
            return redirect('/');
        }else{
            return redirect('login')->with('error', 'لا يوجد بيانات لرقم الهوية');
        }
        
    }
    
    public function logout(Request $request)
    {
        session()->forget('user');
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

    
    
}

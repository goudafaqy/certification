<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use App\Mail\SendResetPasswordLink;
use Illuminate\Support\Facades\Mail;
use DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    public function getSendResetLink($token){
        return view('auth.passwords.email',['token'=>$token]) ;
    }

    public function sendResetLink(Request $request){

        $messages = [
            'email.required' => __('Email is required') ,
            'email.email' => __('Please enter a valid email') ,
        ];
        $this->validate($request , [
            'email' => 'required|email'
        ],$messages);
        $email = $request->get('email') ;
        $user = User::where('email' , $email )->first();

        if($user){

        //Create Password Reset Token
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $this->_generateRandomString(60),
            'created_at' => date('Y-m-d H:i:s')
        ]);
        //Get the token just created above
        $tokenData = DB::table('password_resets')
        ->where('email', $request->email)->first();

        $link = url('reset/' . $tokenData->token . '?email=' . urlencode($user->email));
            Mail::to($email)->send(new SendResetPasswordLink($link)) ;
            return redirect()->back()->with('info', 'من فضلك افحص البريد الالكترونى الخاص بك');
        }
        $request->session()->flash('email_not_found' , __('Sorry we can not proceed with your request cause this email is not found in our systems'));
        return back();
    }


    public function getResetPasswordPage(Request $request){

        return view('passwords.reset') ;
    }

    public function resetPassword(Request $request){


        if(empty($request->get('token'))){
            return redirect()->back()->with('info', 'رابط غير صحيح');
        }

        // $messages = [

        //     'password.required' => __('The password field is required.') ,
        //     'password.min' => __('Password Length is not correct , minimum is 6') ,

        // ];

        // $this->validate($request , [
        //     'password' => 'required|min:6|confirmed'
        // ],$messages);


        $email_token = $request->get('token') ;
        $tokenData = DB::table('password_resets')
            ->where('token', $email_token)->first();
        $user = User::where('email' , $tokenData->email )->first();
        if($user){

            $user->password =   Hash::make($request->get('new_password'));
            $user->save();
            $request->session()->flash('info' , 'لقد تم تغيير كلمة السر الخاصة بك');
            return redirect()->route('login') ;

        }
        $request->session()->flash('info' , __('Invalid Token Provided to reset your password , please make sure to click the right link from your inbox'));
        return back();

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

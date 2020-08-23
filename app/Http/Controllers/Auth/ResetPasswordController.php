<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;


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

    public function rules()
    {
        return [
            'password' => 'required|password',
            'new_password' => 'required|confirmed|min:6',
        ];
    }

    public function validationErrorMessages()
    {
        return [
            'password.password' => 'كلمة السر غير صحيحة',
            'new_password.confirmed' => 'كلمة السر الجديدة غير متطابقة',
            'new_password.min' => 'كلمة السر يجب ان تكون على الاقل 6 احرف'
        ];
    }

    public function reset(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());
        $user = Auth::user();
        $this->resetPassword($user, $request->new_password);
        return $this->sendResetResponse($request, Password::PASSWORD_RESET);
    }


    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
}

<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function edit(){
        $user = Auth::user();
        return view('cp.profile.profile',compact('user'));
    }

    public function save(Request $request){
        dd($request->all());
        $messages = [
            'mobile.regex' => 'صيغه الجوال غير صحيحه مثال : 966500000000',
            'mobile.size' => 'صيغه الجوال غير صحيحه',
            'national_id.numeric' => 'هذا الحقل يجب ان يكون رقما',
        ];

        return Validator::make($data, [
            'name_ar' => ['required', 'string', 'max:255'],
            'name_en' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'national_id' => ['required', 'numeric'],
            'mobile' => 'required|regex:/(966)[0-9]{9}/|size:12',
            'birth_date' => ['required', 'date'],
            'gender' => ['required'],
            'education' => ['required']
        ], $messages);
        $user = Auth::user();
        return view('cp.profile.profile',compact('user'));
    }
}

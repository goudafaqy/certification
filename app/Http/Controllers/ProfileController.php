<?php

namespace App\Http\Controllers;

use App\Http\Helpers\FileHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit(){
        $user = Auth::user()->load('roles');
        return view('cp.profile.profile',compact('user'));
    }

    public function save(Request $request){
        $messages = [
            'mobile.regex' => 'صيغه الجوال غير صحيحه مثال : 966500000000',
            'mobile.size' => 'صيغه الجوال غير صحيحه',
            'national_id.numeric' => 'هذا الحقل يجب ان يكون رقما',
        ];

        $validator = Validator::make($request->all(), [
            'name_ar' => ['required', 'string', 'max:255'],
            'name_en' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'national_id' => ['required', 'numeric', Rule::unique('users')->ignore($user->id)],
            'mobile' => 'required|regex:/(966)[0-9]{9}/|size:12',
            'birth_date' => ['required', 'date'],
            'gender' => ['required'],
            'education' => ['required']
        ], $messages);
        if ($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $user->fill($request->all());
        if($request->file()) {
            $filePath = FileHelper::uploadFiles($request->file('image'), 'uploads/profiles/');
            $user->image = $filePath;
        }
        $user->save();
        return redirect()->route('edit-profile')->with([
            'updated' =>  __('app.Update done successfully'),
            'user' => $user
        ]);
    }
}

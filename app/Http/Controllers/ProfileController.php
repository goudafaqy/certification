<?php

namespace App\Http\Controllers;

use App\Http\Helpers\FileHelper;
use App\Http\Requests\UpdateProfile;
use App\Models\Qualifications;
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

    public function save(UpdateProfile $request){

        $user = Auth::user();
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

    public function saveQualifications(Request $request){
        $user = Auth::user();
        Qualifications::where('user_id', $user->id)->where('type',$request->get('type'))->delete();
        foreach ($request->get('group-a') as $group) {
            Qualifications::create([
                "user_id" => $user->id,
                "type" => $request->get('type'),
                "body" => $group['body'],
            ]);
        }

        return redirect()->back();
    }
}

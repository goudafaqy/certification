<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * List the application users ...
     */
    public function list()
    {
        $users = DB::table('users')->get();
        return view("users.users-list", ['users' => $users]);
    }


    /**
     * Get add user page ...
     */
    public function add()
    {
        return view("users.users-add");
    }


    /**
     * Save user date ...
     */
    public function create(Request $request)
    {
        $inputs = $request->input();

        $validator = Validator::make($inputs,[
            'name_ar' => 'required',
            'name_en' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'role' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect('users/add')->withErrors($validator)->withInput();
        }else{
            $user = DB::table('users')->insert([
                'name_ar' => $inputs['name_ar'],
                'name_en' => $inputs['name_en'],
                'username' => $inputs['username'],
                'email' => $inputs['email'],
                'password' => Hash::make($inputs['password']),
                'role' => $inputs['role'],
                'active' => isset($inputs['active']) ? true : false,
            ]);
            if($user){
                return redirect('users/list')->with('added', 'تمت إضافة المستخدم بنجاح');
            }
        }
    }


    /**
     * Get update user page ...
     */
    public function update($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view("users.users-update", ['user' => $user]);
    }

    /**
     * Update user date ...
     */
    public function edit(Request $request)
    {
        $inputs = $request->input();

        $validator = Validator::make($inputs,[
            'name_ar' => 'required',
            'name_en' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'role' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect('users/update/'.$inputs['id'])->withErrors($validator)->withInput();
        }else{
            $user = DB::table('users')->where('id', $inputs['id'])->update([
                'name_ar' => $inputs['name_ar'],
                'name_en' => $inputs['name_en'],
                'username' => $inputs['username'],
                'email' => $inputs['email'],
                'password' => Hash::make($inputs['password']),
                'role' => $inputs['role'],
                'active' => isset($inputs['active']) ? true : false,
            ]);
            if($user){
                return redirect('users/list')->with('updated', 'تمت تعديل بيانات المستخدم بنجاح');
            }
        }
    }


    /**
     * Delete user date ...
     */
    public function delete($id)
    {
        $result = DB::table('users')->where('id', '=', $id)->delete();
        if($result){
            return redirect('users/list')->with('deleted', 'تم حذف المستخدم بنجاح');
        }
    }
}

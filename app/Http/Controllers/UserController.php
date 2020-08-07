<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Eloquent\UserRepo;
use App\Http\Repositories\Validation\UserRepoValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    var $userRepo;
    var $userValidation;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepo $userRepo, UserRepoValidation $userValidation)
    {
        $this->userRepo         = $userRepo;
        $this->userValidation   = $userValidation;
        $this->middleware('auth');
    }

    /**
     * List the application users ...
     */
    public function list()
    {
        $users = $this->userRepo->getAll();
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
        
        $validator = $this->userValidation->doValidate($inputs, 'insert');
        if ($validator->fails()) {
            return redirect('users/add')->withErrors($validator)->withInput();
        }else{
            $inputs['active'] = isset($inputs['active']) ? true : false;
            $inputs['password'] = Hash::make($inputs['password']);

            $user = $this->userRepo->save($inputs);
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
        $user = $this->userRepo->getById($id);
        return view("users.users-update", ['user' => $user]);
    }

    /**
     * Update user date ...
     */
    public function edit(Request $request)
    {
        $inputs = $request->input();

        $validator = $this->userValidation->doValidate($inputs, 'update');
        if ($validator->fails()) {
            return redirect('users/update/'.$inputs['id'])->withErrors($validator)->withInput();
        }else{
            $inputs['active'] = isset($inputs['active']) ? true : false;
            $inputs['password'] = Hash::make($inputs['password']);
            unset($inputs['_token']);
            unset($inputs['password_confirmation']);
            
            $user = $this->userRepo->update($inputs, $inputs['id']);
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
        $result = $this->userRepo->delete($id);
        if($result){
            return redirect('users/list')->with('deleted', 'تم حذف المستخدم بنجاح');
        }
    }
}

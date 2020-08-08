<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Eloquent\RoleRepo;
use App\Http\Repositories\Eloquent\UserRepo;
use App\Http\Repositories\Validation\UserRepoValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    var $userRepo;
    var $roleRepo;
    var $userValidation;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        UserRepo $userRepo, 
        RoleRepo $roleRepo, 
        UserRepoValidation $userValidation
        )
    {
        $this->userRepo         = $userRepo;
        $this->roleRepo         = $roleRepo;
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
        $roles = $this->roleRepo->getAll();
        return view("users.users-add", ['roles' => $roles]);
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
            $roles = $inputs['role'];
            unset($inputs['role']);
            unset($inputs['_token']);
            unset($inputs['password_confirmation']);
            $userId = $this->userRepo->save($inputs, true);
            if($userId){
                $userId = $this->userRepo->saveRoles($roles, $userId);
                return redirect('users/list')->with('added', 'تمت إضافة المستخدم بنجاح');
            }
        }
    }


    /**
     * Get update user page ...
     */
    public function update($id)
    {
        $roles = $this->roleRepo->getAll();
        $user = $this->userRepo->getById($id);
        $selectedRoles = [];
        foreach ($user->roles as $role) {
            array_push($selectedRoles, $role->id);
        }
        return view("users.users-update", ['user' => $user, 'roles' => $roles, 'selectedRoles' => $selectedRoles]);
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
            $roles = $inputs['role'];
            unset($inputs['role']);
            
            $user = $this->userRepo->update($inputs, $inputs['id']);
            $this->userRepo->saveRoles($roles, $inputs['id']);
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

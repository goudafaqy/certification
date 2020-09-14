<?php

namespace App\Http\Controllers;

use App\Http\Helpers\DateHelper;
use App\Http\Repositories\Eloquent\RoleRepo;
use App\Http\Repositories\Eloquent\UserRepo;
use App\Http\Repositories\Validation\UserRepoValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Mail\InstructorAccount;
use Illuminate\Support\Facades\Mail;

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
        $users = $this->userRepo->getAll('roles');
        return view("cp.users.users-list", ['users' => $users]);
    }


    /**
     * Get add user page ...
     */
    public function add()
    {
        $roles = $this->roleRepo->getAll();
        return view("cp.users.users-add", ['roles' => $roles]);
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
            $pass = $inputs['password'];
            $inputs['password'] = Hash::make($inputs['password']);
            $roles = $inputs['role'];
            ## to add support agent if the roles has 'support
            if(array_search(4, $roles) !==false){
                $inputs['panichd_agent'] = 1;
            }
            if(array_search(1, $roles) !==false){
                $inputs['panichd_admin'] = 1;
            }
            $inputs['birth_date'] = DateHelper::getDateFormate($inputs['birth_date']);
            unset($inputs['role']);
            unset($inputs['_token']);

            unset($inputs['password_confirmation']);
            $userId = $this->userRepo->save($inputs, true);
            if($userId){
                 $this->userRepo->saveRoles($roles, $userId);

                 if(in_array('2',$roles)){
                   // Send Mail Notification To Instructor
                    $inputs['password'] = $pass;
                    $instructor =  $this->userRepo->getById($userId, 'roles');
                    $data = [
                        'title_ar'=>   __('app.You have new account'),
                        'title_en'=>   __('app.You have new account'),
                        'message_ar'=>    '   لقد تم انشاء حساب لكم كمدرب دورات لدي مركز التدريب العدلى بالبيانات الاتية',
                        'message_en'=> '  New Account Created For You With The Following Data :',
                        'user_id'=>     $userId,
                        'type'=>       'info',
                        'name'=>       $instructor->name,
                        'email'=>      $instructor->email,
                        'link' =>       url('login'),
                        'extra_text'=> '',
                        'password' => $pass

                    ];
                    $not = new NotificationsController();
                    $not->Send_Notification_And_Email($data, 'instructor_account_notification');

                }
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
        $user = $this->userRepo->getById($id, 'roles');
        $selectedRoles = [];
        foreach ($user->roles as $role) {
            array_push($selectedRoles, $role->id);
        }
        return view("cp.users.users-update", ['user' => $user, 'roles' => $roles, 'selectedRoles' => $selectedRoles]);
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
            $inputs['birth_date'] = DateHelper::getDateFormate($inputs['birth_date']);
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
        $this->userRepo->deleteAssocciated($id);
        $result = $this->userRepo->delete($id);
        if($result){
            return redirect('users/list')->with('deleted', 'تم حذف المستخدم بنجاح');
        }
    }
}

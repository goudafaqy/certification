<?php

namespace App\Http\Controllers;
use App\Http\Repositories\Eloquent\NotificationRepo;
use App\Http\Repositories\Validation\NotificationRepoValidation;
use Illuminate\Http\Request;
use App\Http\Helpers\FileHelper;
use App\Models\NotificationSetting;
use Illuminate\Support\Facades\Mail;
use App\Models\Notification;
use App\Models\CourseUser;
use App\Models\RoleUser;

use App\Http\Repositories\Eloquent\RoleRepo;
use App\Http\Repositories\Eloquent\CourseRepo;
use App\Http\Repositories\Eloquent\UserRepo;

class NotificationsSettingsController extends Controller
{
    var $validation;
    var $NotificationRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(

        NotificationRepoValidation $validation,
        NotificationRepo $NotificationRepo,
        RoleRepo $roleRepo,
        CourseRepo $courseRepo,
        UserRepo $userRepo
    )
    {
        $this->RoleRepo = $roleRepo;
        $this->validation = $validation;
        $this->NotificationRepo = $NotificationRepo;
        $this->courseRepo = $courseRepo;
        $this->userRepo = $userRepo;
        $this->middleware('auth');
    }

    /**
     * List the application classification ...
     */
    public function list()
    {

       
        $notifications = $this->NotificationRepo->getAll();
        return view("cp.notifications.list", ['items' => $notifications ]);
    }


    /**
     * Get add classification page ...
     */
    public function add()
    {
        $item = new $this->NotificationRepo();
        $title = __('app.New Notification'); 
        $route = route('save-notify');
        $types =  ['info','success','warning'];
        $roles = $this->RoleRepo->getAll();
        $courses = $this->courseRepo->getAll();
        $users = $this->userRepo->getAll();
        return view("cp.notifications.form", [ 'route'=>$route ,'types'=>$types,
        'title'=>$title ,'item' => $item, 'roles'=>$roles, 'courses'=>$courses, 'users'=>$users ]);
    }


    /**
     * Save classification date ...
     */
    public function create(Request $request)
    {
        $inputs = $request->input();
       // $this->add_notification( $inputs, 'notifications');
        if($inputs['sending_to'] == 'users' ){

            
            $inputs['users'] =  implode(',',$inputs['users']);
            $inputs['courses'] = '';
            $inputs['roles'] = '';
        }
        elseif($inputs['sending_to'] == 'courses' ){

            
            $inputs['courses'] =  implode(',',$inputs['courses']);
            $inputs['users'] = '';
            $inputs['roles'] = '';
        }
        elseif($inputs['sending_to'] == 'roles' ){

            $inputs['roles'] =  implode(',',$inputs['roles']);
            $inputs['users'] = '';
            $inputs['courses'] = '';
        }

        
        $inputs['created_by'] = \Auth::user()->id;
        $validator = $this->validation->doValidate($inputs, 'insert');
        if ($validator->fails()) {
            
            return redirect('notifications/add')->withErrors($validator)->withInput();
        }else{
            
            $item = $this->NotificationRepo->save($inputs);
            if($item){
                return redirect('notifications')->with('added', __('app.Notification Added Successfully'));
            }
        }
    }


    /**
     * Get update classification page ...
     */
    public function update($id)
    {
        $item = $this->NotificationRepo->getById($id);
        $route = route('update-notify',['id'=>$id]);
        $title = __('app.Update Notification'); 
        $types =  ['info','success','warning'];
        $roles = $this->RoleRepo->getAll();
        $courses = $this->courseRepo->getAll();
        $users = $this->userRepo->getAll();
        return view("cp.notifications.form", ['item' => $item  ,'types'=>$types , 'route' => $route, 'title' =>  $title, 'roles'=>$roles, 'courses'=>$courses, 'users'=>$users ]);
    }

    /**
     * Update classification date ...
     */
    public function edit(Request $request)
    {
        $inputs = $request->input();

        $validator = $this->validation->doValidate($inputs, 'update');     
        if ($validator->fails()) {
            return redirect('notifications/update/'.$inputs['id'])->withErrors($validator)->withInput();
        }else{
            
            unset($inputs['_token']);
            $classification = $this->NotificationRepo->update($inputs, $inputs['id']);
            if($classification){
                return redirect('notifications')->with('updated', __('app.Notification Updated Successfully'));
            }
        }
    }


    /**
     * Delete classification date ...
     */
    public function delete($id)
    {
        $result = $this->NotificationRepo->delete($id);
        if($result){
            return redirect('notifications')->with('deleted', __('app.Notification Deleted Successfully'));
        }
    }

    function add_notification($data){


        if($data['sending_to'] == 'users' ){
            $users = $this->userRepo->getByIds($data['users']);
           
        }
        elseif($data['sending_to'] == 'courses' ){
    
            $coursesUsers = CourseUser::whereIn('course_id', $data['courses'])->pluck('user_id')->toArray();
            $users = $this->userRepo->getByIds($coursesUsers);
        }
        elseif($data['sending_to'] == 'roles' ){
           
            $rolesUsers = RoleUser::whereIn('role_id', $data['roles'])->pluck('user_id')->toArray();
            $users = $this->userRepo->getByIds($rolesUsers);
          
        }
        foreach( $users as $user){

            $data_notifications = [

                'title_ar'=>     $data['title_ar'],
                'title_en'=>     $data['title_en'],
                'message_ar'=>   $data['message_ar'],
                'message_en'=>   $data['message_en'],
                'user_id'=>      $user->id,
                'type'=>         $data['type'],
                'name'=>         $user->name_ar,
                'email'=>        $user->email,
                'link' =>        $data['link'],
                'extra_text'=>   $data['extra_text']
                
            ];
            $not = new NotificationsController();
            $not->Send_Notification_And_Email($data_notifications, 'notification');
        }

        
    }

}

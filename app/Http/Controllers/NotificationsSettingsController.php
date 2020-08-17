<?php

namespace App\Http\Controllers;
use App\Http\Repositories\Eloquent\NotificationRepo;
use App\Http\Repositories\Validation\NotificationRepoValidation;
use Illuminate\Http\Request;
use App\Http\Helpers\FileHelper;
use App\Models\NotificationSetting;

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
        NotificationRepo $NotificationRepo
    )
    {
        $this->validation = $validation;
        $this->NotificationRepo = $NotificationRepo;
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
        return view("cp.notifications.form", [ 'route'=>$route ,'types'=>$types,'title'=>$title ,'item' => $item ]);
    }


    /**
     * Save classification date ...
     */
    public function create(Request $request)
    {
        $inputs = $request->input();

        
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
        return view("cp.notifications.form", ['item' => $item  ,'types'=>$types , 'route' => $route, 'title' =>  $title ]);
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
}

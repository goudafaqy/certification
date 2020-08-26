<?php

namespace App\Http\Controllers;
use App\Http\Repositories\Eloquent\AdvertismentRepo;
use App\Http\Repositories\Validation\AdvertismentRepoValidation;
use Illuminate\Http\Request;
use App\Http\Helpers\FileHelper;
use Illuminate\Support\Facades\Mail;
use App\Models\Advertisment;
use App\Models\Newsletter;


class AdvertismentsController extends Controller
{
    var $validation;
    var $AdvertismentRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(

        AdvertismentRepoValidation $validation,
        AdvertismentRepo $AdvertismentRepo
    )
    {
        $this->validation = $validation;
        $this->AdvertismentRepo = $AdvertismentRepo;
        $this->middleware('auth');
    }

    /**
     * List the application classification ...
     */
    public function list()
    {

       
        $Advertisments = $this->AdvertismentRepo->getAll();
        return view("cp.advertisments.list", ['items' => $Advertisments ]);
    }


    /**
     * Get add classification page ...
     */
    public function add()
    {
        $item = new $this->AdvertismentRepo();
        $title = __('app.New Advertisment'); 
        $route = route('save-advertisments');
        return view("cp.advertisments.form", [ 'route'=>$route ,
        'title'=>$title ,'item' => $item ]);
    }


    /**
     * Save classification date ...
     */
    public function create(Request $request)
    {
        $inputs = $request->input();
        $this->add_notify( $inputs, 'Advertisments');
        
        $inputs['created_by'] = \Auth::user()->id;
        $validator = $this->validation->doValidate($inputs, 'insert');
        $validatedData = $request->validate([
            'image' => 'required'
        ]);

        if ($validator->fails()) {
            
            return redirect('advertisments/add')->withErrors($validator)->withInput();
        }else{
            
            if($request->file('image') == null) {
            
                    return redirect('advertisments/add')->withErrors('image')->withInput();

            }else{
                $filePath = FileHelper::uploadFiles($request->file('image'), 'uploads/advertisments/');
                $inputs['image'] = $filePath;
            }
           
            $item = $this->AdvertismentRepo->save($inputs);
            if($item){
                return redirect('advertisments')->with('added', __('app.Advertisment Added Successfully'));
            }
        }
    }


    /**
     * Get update classification page ...
     */
    public function update($id)
    {
        $item = $this->AdvertismentRepo->getById($id);
        $route = route('update-advertisments',['id'=>$id]);
        $title = __('app.Update Advertisment'); 
        return view("cp.advertisments.form", ['item' => $item  , 'route' => $route, 'title' =>  $title ]);
    }

    /**
     * Update classification date ...
     */
    public function edit(Request $request)
    {
        $inputs = $request->input();

        $validator = $this->validation->doValidate($inputs, 'update');     
        if ($validator->fails()) {
            return redirect('advertisments/update/'.$inputs['id'])->withErrors($validator)->withInput();
        }else{
            if($request->file()) {
                $filePath = FileHelper::uploadFiles($request->file('image'), 'uploads/advertisments/');
                $inputs['image'] = $filePath;
            }
            unset($inputs['_token']);
            $advertisment = $this->AdvertismentRepo->update($inputs, $inputs['id']);
            if($advertisment){
                return redirect('advertisments')->with('updated', __('app.Advertisment Updated Successfully'));
            }
        }
    }


    /**
     * Delete classification date ...
     */
    public function delete($id)
    {
        $result = $this->AdvertismentRepo->delete($id);
        if($result){
            return redirect('advertisments')->with('deleted', __('app.Advertisment Deleted Successfully'));
        }
    }

    function add_notify($data){


        $users = Newsletter::get();
        foreach( $users as $user){

            $data_Advertisments = [

                'title_ar'=>     $data['title_ar'],
                'title_en'=>     $data['title_en'],
                'message_ar'=>   $data['message_ar'],
                'message_en'=>   $data['message_en'],
                'user_id'=>      $user->id,
                'type'=>         'info',
                'name'=>         '',
                'email'=>        $user->email,
                'link' =>        '',
                'extra_text'=>   ''
                
            ];
            $not = new NotificationsController();
            $not->Send_Notification_And_Email($data_Advertisments, 'advertisment_notification');
        }

        
    }

}

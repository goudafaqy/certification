<?php

namespace App\Http\Controllers;
use App\Http\Repositories\Eloquent\TestmonialRepo;
use App\Http\Repositories\Validation\TestmonialRepoValidation;
use Illuminate\Http\Request;
use App\Http\Helpers\FileHelper;
use Illuminate\Support\Facades\Mail;
use App\Models\Testmonial;


class TestmonialsController extends Controller
{
    var $validation;
    var $TestmonialRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(

        TestmonialRepoValidation $validation,
        TestmonialRepo $TestmonialRepo
    )
    {
        $this->validation = $validation;
        $this->TestmonialRepo = $TestmonialRepo;
        $this->middleware('auth');
    }

    /**
     * List the application classification ...
     */
    public function list()
    {

       
        $Testmonials = $this->TestmonialRepo->getAll();
        return view("cp.testmonials.list", ['items' => $Testmonials ]);
    }


    /**
     * Get add classification page ...
     */
    public function add()
    {
        $item = new $this->TestmonialRepo();
        $title = __('app.New Testmonial'); 
        $route = route('save-testmonials');
        return view("cp.testmonials.form", [ 'route'=>$route ,
        'title'=>$title ,'item' => $item ]);
    }


    /**
     * Save classification date ...
     */
    public function create(Request $request)
    {
        $inputs = $request->input();
        $inputs['created_by'] = \Auth::user()->id;
        $validator = $this->validation->doValidate($inputs, 'insert');
        $validatedData = $request->validate([
            'image' => 'required'
        ]);

        if ($validator->fails()) {
            
            return redirect('testmonials/add')->withErrors($validator)->withInput();
        }else{
            
            if($request->file('image') == null) {
            
                    return redirect('testmonials/add')->withErrors('image')->withInput();

            }else{
                $filePath = FileHelper::uploadFiles($request->file('image'), 'uploads/testmonials/');
                $inputs['image'] = $filePath;
            }
           
            $item = $this->TestmonialRepo->save($inputs);
            if($item){
                return redirect('testmonials')->with('added', __('app.Testmonial Added Successfully'));
            }
        }
    }


    /**
     * Get update classification page ...
     */
    public function update($id)
    {
        $item = $this->TestmonialRepo->getById($id);
        $route = route('update-testmonials',['id'=>$id]);
        $title = __('app.Update Testmonial'); 
        return view("cp.testmonials.form", ['item' => $item  , 'route' => $route, 'title' =>  $title ]);
    }

    /**
     * Update classification date ...
     */
    public function edit(Request $request)
    {
        $inputs = $request->input();

        $validator = $this->validation->doValidate($inputs, 'update');     
        if ($validator->fails()) {
            return redirect('testmonials/update/'.$inputs['id'])->withErrors($validator)->withInput();
        }else{
            if($request->file()) {
                $filePath = FileHelper::uploadFiles($request->file('image'), 'uploads/testmonials/');
                $inputs['image'] = $filePath;
            }
            unset($inputs['_token']);
            $Testmonial = $this->TestmonialRepo->update($inputs, $inputs['id']);
            if($Testmonial){
                return redirect('testmonials')->with('updated', __('app.Testmonial Updated Successfully'));
            }
        }
    }


    /**
     * Delete classification date ...
     */
    public function delete($id)
    {
        $result = $this->TestmonialRepo->delete($id);
        if($result){
            return redirect('testmonials')->with('deleted', __('app.Testmonial Deleted Successfully'));
        }
    }

    function add_Testmonial($data){


        $users = Newsletter::get();
        foreach( $users as $user){

            $data_Testmonials = [

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
            //$not = new TestmonialsController();
            //$not->Send_Testmonial_And_Email($data_Testmonials, 'Testmonial');
        }

        
    }

}

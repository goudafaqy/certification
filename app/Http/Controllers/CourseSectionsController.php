<?php

namespace App\Http\Controllers;
use App\Http\Repositories\Eloquent\SectionRepo;
use App\Http\Repositories\Validation\SectionRepoValidation;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseSectionsController extends Controller
{
    var $validation;
    var $SectionRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(

        SectionRepoValidation $validation,
        SectionRepo $SectionRepo
    )
    {
        $this->validation = $validation;
        $this->SectionRepo = $SectionRepo;
        $this->middleware('auth');
    }

    /**
     * List the application classification ...
     */
    public function list($course_id)
    {
        $items  = $this->SectionRepo->getAll($course_id);
        $course = Course::find($course_id);

        return view("cp.sections.list", ['items' => $items,'course'=>$course, 'course_id'=>$course_id]);
    }


    /**
     * Get add classification page ...
     */
    public function add($course_id)
    {
        $item = new $this->SectionRepo();
        $title = __('app.New Section'); 
        $course = Course::find($course_id);
        $route = route('save-sections',['course_id'=>$course_id]);
        return view("cp.sections.form", ['route'=> $route ,'course'=>$course,'title'=>$title ,'item' => $item ,'course_id' =>$course_id]);
    }


    /**
     * Save classification date ...
     */
    public function create(Request $request)
    {
        $inputs = $request->input();
        $validator = $this->validation->doValidate($inputs, 'insert');
        if ($validator->fails()) {
            
            return redirect('sections/add/'.$inputs['course_id'])->withErrors($validator)->withInput();
        }else{
           
            $Section = $this->SectionRepo->save($inputs);
            if($Section){
                return redirect('sections/'.$inputs['course_id'])->with('added', __('app.Element Added Auccessfully'));
            }
        }
    }


    /**
     * Get update classification page ...
     */
    public function update($id)
    {
        $item = $this->SectionRepo->getById($id);
        $course = Course::find($item->course_id);
        $route = route('update-sections',['course_id'=> $item->course_id ,'id'=>$id]);
        $title = __('app.Update Section'); 
        return view("cp.sections.form", ['item' => $item,'course'=>$course,  'route' => $route, 'title' =>  $title ,'course_id'=>$item->course_id]);
    }

    /**
     * Update classification date ...
     */
    public function edit(Request $request)
    {
        $inputs = $request->input();

        $validator = $this->validation->doValidate($inputs, 'update');     
        if ($validator->fails()) {
            return redirect('sections/update/'.$inputs['id'])->withErrors($validator)->withInput();
        }else{
           
            unset($inputs['_token']);
            $classification = $this->SectionRepo->update($inputs, $inputs['id']);
            if($classification){
                return redirect('sections/'.$inputs['course_id'])->with('updated', __('app.Element Updated Auccessfully'));
            }
        }
    }


    /**
     * Delete classification date ...
     */
    public function delete($id,$course_id)
    {
        $result = $this->SectionRepo->delete($id);
        if($result){
            return redirect('sections/'.$course_id)->with('deleted', __('app.Element Deleted Auccessfully'));
        }
    }
}

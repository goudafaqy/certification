<?php

namespace App\Http\Controllers;
use App\Http\Repositories\Eloquent\MaterialRepo;
use App\Http\Repositories\Validation\MaterialRepoValidation;
use Illuminate\Http\Request;
use App\Http\Helpers\FileHelper;
use App\Models\Course;

class CourseMaterialsController extends Controller
{
    var $validation;
    var $MaterialRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(

        MaterialRepoValidation $validation,
        MaterialRepo $MaterialRepo
    )
    {
        $this->validation = $validation;
        $this->MaterialRepo = $MaterialRepo;
        $this->middleware('auth');
    }

    /**
     * List the application classification ...
     */
    public function list($course_id)
    {
        $course = Course::find($course_id);
        $materials = $this->MaterialRepo->getAll($course_id);
        return view("materials.list", ['materials' => $materials  ,'course_id'=>$course_id ,'course'=>$course]);
    }


    /**
     * Get add classification page ...
     */
    public function add($course_id)
    {
        $material = new $this->MaterialRepo();
        $types =  ['Trainee guide','Instructor Guide','Book','Extra recourses','Image'];
        $title = __('app.New Material'); 
        $course = Course::find($course_id);

        $route = route('save-materials',['course_id'=>$course_id]);
        return view("materials.form", ['types' => $types , 'course'=>$course , 'route'=>$route ,'title'=>$title ,'material' => $material ,'course_id' =>$course_id]);
    }


    /**
     * Save classification date ...
     */
    public function create(Request $request)
    {
        $inputs = $request->input();

        
        $validator = $this->validation->doValidate($inputs, 'insert');
        
        if ($validator->fails()) {
            
            return redirect('materials/add/'.$inputs['course_id'])->withErrors($validator)->withInput();
        }else{
            if($request->file()) {
                $filePath = FileHelper::uploadFiles($request->file('source'), 'uploads/materials/');
            }
            $inputs['source'] = $filePath;
            $material = $this->MaterialRepo->save($inputs);
            if($material){
                return redirect('materials/'.$inputs['course_id'])->with('added', __('app.Material Added Auccessfully'));
            }
        }
    }


    /**
     * Get update classification page ...
     */
    public function update($id)
    {
        $material = $this->MaterialRepo->getById($id);
        $route = route('update-materials',['course_id'=> $material->course_id ,'id'=>$id]);
        $title = __('app.Update Material'); 
        $course = Course::find($material->course_id);
        $types =  ['Trainee guide','Instructor Guide','Book','Extra recourses','Image'];
        return view("materials.form", ['material' => $material,'course'=>$course, 'types' => $types , 'route' => $route, 'title' =>  $title ,'course_id'=>$material->course_id]);
    }

    /**
     * Update classification date ...
     */
    public function edit(Request $request)
    {
        $inputs = $request->input();

        $validator = $this->validation->doValidate($inputs, 'update');     
        if ($validator->fails()) {
            return redirect('materials/update/'.$inputs['id'])->withErrors($validator)->withInput();
        }else{
            $filePath = '';
            if($request->file()) {
                $filePath = FileHelper::uploadFiles($request->file('source'), 'uploads/materials/');
            }
            $inputs['source'] = $filePath;
            unset($inputs['_token']);
            $classification = $this->MaterialRepo->update($inputs, $inputs['id']);
            if($classification){
                return redirect('materials/'.$inputs['course_id'])->with('updated', __('app.Material Updated Auccessfully'));
            }
        }
    }


    /**
     * Delete classification date ...
     */
    public function delete($id,$course_id)
    {
        $result = $this->MaterialRepo->delete($id);
        if($result){
            return redirect('materials/'.$course_id)->with('deleted', __('app.Material Deleted Auccessfully'));
        }
    }
}

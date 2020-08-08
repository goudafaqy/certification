<?php

namespace App\Http\Controllers;
use App\Http\Repositories\Eloquent\MaterialRepo;
use App\Http\Repositories\Validation\MaterialRepoValidation;
use Illuminate\Http\Request;

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
        $materials = $this->MaterialRepo->getAll($course_id);
        return view("materials.list", ['materials' => $materials  ,'course_id'=>$course_id]);
    }


    /**
     * Get add classification page ...
     */
    public function add($course_id)
    {
        $types =  ['Trainee guide','Instructor Guide','Book','Extra recourses','Image','Video'];
        $route = route('save-materials',['course_id'=>$course_id]);
        return view("materials.add", ['types' => $types ,'route'=>$route]);
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
            $classification = $this->MaterialRepo->save($inputs);
            if($classification){
                return redirect('materials/list')->with('added', __('app.Material Added Auccessfully'));
            }
        }
    }


    /**
     * Get update classification page ...
     */
    public function update($id)
    {
        $classification = $this->MaterialRepo->getById($id);
        $types =  ['Trainee guide','Instructor Guide','Book','Extra recourses','Image','Video'];
        return view("materials.update", ['classification' => $classification, 'types' => $types]);
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
            unset($inputs['_token']);
            $classification = $this->MaterialRepo->update($inputs, $inputs['id']);
            if($classification){
                return redirect('materials/list')->with('updated', 'تمت تعديل بيانات التصنيف بنجاح');
            }
        }
    }


    /**
     * Delete classification date ...
     */
    public function delete($id)
    {
        $result = $this->MaterialRepo->delete($id);
        if($result){
            return redirect('materials/list')->with('deleted', 'تم حذف التصنيف بنجاح');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class CourseMaterialsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * List the application classification ...
     */
    public function list()
    {
        $materials = DB::table('course_materials')->get();
        
        $categories = ['Trainee guide','Instructor Guide','Book','Extra recourses','Image','Video'];
            
        return view("materials.list", ['materials' => $materials , 'categories' => $categories]);
    }


    /**
     * Get add classification page ...
     */
    public function add()
    {
        $categories = ['Trainee guide','Instructor Guide','Book','Extra recourses','Image','Video'];
        return view("materials.add", ['categories' => $categories]);
    }


    /**
     * Save classification date ...
     */
    public function create(Request $request)
    {
        $inputs = $request->input();

        $validator = Validator::make($inputs,[
            'name_ar'  => 'required',
            'name_en'  => 'required',
            'type'    => 'required',
            'description'    => 'required',
            'source'    => 'required'
        ]);
        
        if ($validator->fails()) {
            return redirect('materials/add')->withErrors($validator)->withInput();
        }else{
            $classification = DB::table('course_materials')->insert([
                'name_ar'  => $inputs['name_ar'],
                'name_en'  => $inputs['name_en'],
                'type'    => $inputs['type'],
                'description'    => $inputs['description'],
                'source'    => $inputs['source']
            ]);
            if($classification){
                return redirect('materials/list')->with('added', 'تم إضافة المادة  بنجاح');
            }
        }
    }


    /**
     * Get update classification page ...
     */
    public function update($id)
    {
        $material = DB::table('course_materials')->where('id', $id)->first();
        $categories = ['Trainee guide','Instructor Guide','Book','Extra recourses','Image','Video'];
        return view("materials.update", ['material' => $material, 'categories' => $categories]);
    }

    /**
     * Update classification date ...
     */
    public function edit(Request $request)
    {
        $inputs = $request->input();

        $validator = Validator::make($inputs,[
            'name_ar'  => 'required',
            'name_en'  => 'required',
            'type'    => 'required',
            'description'    => 'required',
            'source'    => 'required'
        ]);
        
        if ($validator->fails()) {
            return redirect('materials/update/'.$inputs['id'])->withErrors($validator)->withInput();
        }else{
            $classification = DB::table('materials')->where('id', $inputs['id'])->update([
                'name_ar'  => $inputs['name_ar'],
                'name_en'  => $inputs['name_en'],
                'type'    => $inputs['type'],
                'description'    => $inputs['description'],
                'source'    => $inputs['source'],
            ]);
            if($classification){
                return redirect('materials/list')->with('updated', 'تمت تعديل بيانات المادة بنجاح');
            }
        }
    }


    /**
     * Delete classification date ...
     */
    public function delete($id)
    {
        $result = DB::table('course_materials')->where('id', '=', $id)->delete();
        if($result){
            return redirect('materials/list')->with('deleted', 'تم حذف المادة بنجاح');
        }
    }
}

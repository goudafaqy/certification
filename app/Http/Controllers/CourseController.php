<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
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
     * List the application Courses ...
     */
    public function list()
    {
        $courses = DB::table('courses')
        ->join('users', 'courses.instructor_id', '=', 'users.id')
        ->join('categories', 'courses.cat_id', '=', 'categories.id')
        ->join('classifications', 'courses.class_id', '=', 'classifications.id')
        ->select('courses.*', 'users.name_ar as instructor', 'categories.title_ar as category', 'classifications.title_ar as classification')
        ->get();
        
        return view("courses.courses-list", ['courses' => $courses]);
    }


    /**
     * Get add course page ...
     */
    public function add()
    {
        $instructors        = DB::table('users')->where('role', 'instructor')->get();
        $categories         = DB::table('categories')->get();
        return view("courses.courses-add", [
            'categories'        => $categories,
            'instructors'       => $instructors
        ]);
    }


    /**
     * Save course date ...
     */
    public function create(Request $request)
    {
        $inputs = $request->input();

        $validator = Validator::make($inputs,[
            'title_ar' => 'required',
            'overview' => 'required',
            'type' => 'required',
            'instructor_id' => 'required',
            'cat_id' => 'required',
            'class_id' => 'required',
            'price' => 'required',
            'discount' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect('courses/add')->withErrors($validator)->withInput();
        }else{

            if($request->file()) {
                $image = $request->file('image');
                $fileName = $image->getClientOriginalName();
                $fileExt = $image->getClientOriginalExtension();
                $filePath = '/uploads/'.$fileName;

                $image->move('uploads',$image->getClientOriginalName());
            }

            $courseId = DB::table('courses')->insertGetId([
                'title_ar'      => $inputs['title_ar'],
                'overview'      => $inputs['overview'],
                'type'          => $inputs['type'],
                'instructor_id' => $inputs['instructor_id'],
                'cat_id'        => $inputs['cat_id'],
                'class_id'      => $inputs['class_id'],
                'price'         => $inputs['price'],
                'discount'      => $inputs['discount'],
                'image'         => $filePath
            ]);
            if($courseId){
                DB::table('courses')->where('id', $courseId)->update([
                    'code'      => $this->generateCode($courseId),
                ]);
                return redirect('courses/list')->with('added', 'تمت إضافة دورة جديدة بنجاح');
            }
        }
    }


    /**
     * Get update course page ...
     */
    public function update($id)
    {
        $instructors        = DB::table('users')->where('role', 'instructor')->get();
        $categories         = DB::table('categories')->get();
        $course = DB::table('courses')->where('id', $id)->first();
        return view("courses.courses-update", ['course' => $course, 'instructors' => $instructors, 'categories' => $categories]);
    }

    /**
     * Update course date ...
     */
    public function edit(Request $request)
    {
        $inputs = $request->input();

        $validator = Validator::make($inputs,[
            'title_ar' => 'required',
            'code' => 'required',
            'overview' => 'required',
            'type' => 'required',
            'instructor_id' => 'required',
            'cat_id' => 'required',
            'class_id' => 'required',
            'price' => 'required',
            'discount' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect('courses/update/'.$inputs['id'])->withErrors($validator)->withInput();
        }else{
            if($request->file()) {
                $image = $request->file('image');
                $fileName = time().'_'.$image->getClientOriginalName();
                $filePath = $image->storeAs('uploads', $fileName, 'public');

                $image->move('uploads',$image->getClientOriginalName());
            }
            $course = DB::table('courses')->where('id', $inputs['id'])->update([
                'title_ar'      => $inputs['title_ar'],
                'overview'      => $inputs['overview'],
                'type'          => $inputs['type'],
                'instructor_id' => $inputs['instructor_id'],
                'cat_id'        => $inputs['cat_id'],
                'class_id'      => $inputs['class_id'],
                'price'         => $inputs['price'],
                'discount'      => $inputs['discount'],
                'image'         => $filePath
            ]);
            if($course){
                return redirect('courses/list')->with('updated', 'تمت تعديل بيانات الدورة بنجاح');
            }
        }
    }


    /**
     * Delete course date ...
     */
    public function delete($id)
    {
        $result = DB::table('courses')->where('id', '=', $id)->delete();
        if($result){
            return redirect('courses/list')->with('deleted', 'تم حذف الدورة بنجاح');
        }
    }

    /**
     * Get classification depend on category id ...
     */
    public function getClassByCatId(Request $request){
        $inputs = $request->input();
        $classifications = DB::table('classifications')->where('cat_id', $inputs['option'])->get();
        return $classifications;
    }


    private function generateCode($id){
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
        $char = substr(str_shuffle($str_result), 0, 4); 
        return $char . "-".$id;
    }

}

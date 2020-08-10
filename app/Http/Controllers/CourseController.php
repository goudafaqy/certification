<?php

namespace App\Http\Controllers;

use App\Http\Helpers\DateHelper;
use App\Http\Repositories\Eloquent\CategoryRepo;
use App\Http\Repositories\Validation\CourseRepoValidation;
use App\Http\Repositories\Eloquent\CourseRepo;
use App\Http\Repositories\Eloquent\UserRepo;
use Illuminate\Http\Request;
use App\Http\Helpers\FileHelper;
use App\Http\Helpers\GenerateHelper;
use App\Http\Repositories\Eloquent\ClassificationRepo;

class CourseController extends Controller
{
    var $courseRepo;
    var $userRepo;
    var $categoryRepo;
    var $classRepo;
    var $courseValidation;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CourseRepo $courseRepo, 
        UserRepo $userRepo, 
        CategoryRepo $categoryRepo,
        ClassificationRepo $classRepo,
        CourseRepoValidation $courseValidation
    )
    {
        $this->courseRepo = $courseRepo;
        $this->userRepo = $userRepo;
        $this->categoryRepo = $categoryRepo;
        $this->classRepo = $classRepo;
        $this->courseValidation = $courseValidation;
        $this->middleware('auth');
    }

    /**
     * List the application Courses ...
     */
    public function list()
    {
        $courses = $this->courseRepo->getAll();
        return view("courses.courses-list", ['courses' => $courses]);
    }


    /**
     * Get add course page ...
     */
    public function add()
    {
        $instructors        = $this->userRepo->getByRole('instructor');
        $categories         = $this->categoryRepo->getAll();
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

        $validator = $this->courseValidation->doValidate($inputs, 'insert');
        if ($validator->fails()) {
            return redirect('courses/add')->withErrors($validator)->withInput();
        }else{
            if($request->file()) {
                $filePath = FileHelper::uploadFiles($request->file('image'), 'uploads/courses/');
            }
            $inputs['image'] = $filePath;
            unset($inputs['_token']);
            $inputs['assi_check'] = (isset($inputs['assi_check']) && $inputs['assi_check'] == 'on') ? 1 : 0;
            $inputs['exam_check'] = (isset($inputs['exam_check']) && $inputs['exam_check'] == 'on') ? 1 : 0;
            $inputs['reg_start_date'] = DateHelper::getDateFormate($inputs['reg_start_date']);
            $inputs['reg_end_date'] = DateHelper::getDateFormate($inputs['reg_end_date']);

            $courseId = $this->courseRepo->save($inputs, true); 
            if($courseId){
                $this->courseRepo->update([
                    'code'      => GenerateHelper::generateCourseCode($courseId),
                ], $courseId);
                return redirect('courses/list')->with('added', 'تمت إضافة دورة جديدة بنجاح');
            }
        }
    }


    /**
     * Get update course page ...
     */
    public function update($id)
    {
        $instructors        = $this->userRepo->getByRole('instructor');
        $categories         = $this->categoryRepo->getAll();
        $course = $this->courseRepo->getById($id);
        return view("courses.courses-update", ['course' => $course, 'instructors' => $instructors, 'categories' => $categories]);
    }

    /**
     * Update course date ...
     */
    public function edit(Request $request)
    {
        $inputs = $request->input();

        $validator = $this->courseValidation->doValidate($inputs, 'update');
        if ($validator->fails()) {
            return redirect('courses/update/'.$inputs['id'])->withErrors($validator)->withInput();
        }else{
            if($request->file()) {
                $filePath = FileHelper::uploadFiles($request->file('image'), 'uploads/courses/');
            }
            $inputs['image'] = $filePath;
            unset($inputs['_token']);
            $inputs['assi_check'] = (isset($inputs['assi_check']) && $inputs['assi_check'] == 'on') ? 1 : 0;
            $inputs['exam_check'] = (isset($inputs['exam_check']) && $inputs['exam_check'] == 'on') ? 1 : 0;
            $inputs['reg_start_date'] = DateHelper::getDateFormate($inputs['reg_start_date']);
            $inputs['reg_end_date'] = DateHelper::getDateFormate($inputs['reg_end_date']);

            $course = $this->courseRepo->update($inputs, $inputs['id']); 
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
        $result = $this->courseRepo->delete($id);
        if($result){
            return redirect('courses/list')->with('deleted', 'تم حذف الدورة بنجاح');
        }
    }

    /**
     * Get classification depend on category id ...
     */
    public function getClassByCatId(Request $request){
        $inputs = $request->input();
        $classifications = $this->classRepo->getByCat($inputs['option']);
        return $classifications;
    }

}

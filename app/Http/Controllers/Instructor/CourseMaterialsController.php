<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Eloquent\MaterialRepo;
use App\Http\Repositories\Validation\MaterialRepoValidation;
use Illuminate\Http\Request;
use App\Http\Helpers\FileHelper;
use App\Http\Helpers\GenerateHelper;

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
        $this->middleware(['auth', 'authorize.instructor']);

    }
    public function createAjax(Request $request)
    {
        $inputs = $request->input();
        $validator = $this->validation->doValidate($inputs, 'insert');
        if ($validator->fails()) {
            return false;
        }else{
            if($request->file()) {
                $filePath = FileHelper::uploadFiles($request->file('source'), 'uploads/materials/');
            }
            $inputs['source'] = $filePath;
            $inputs['status'] = 0;
            $material = $this->MaterialRepo->save($inputs);
            //GenerateHelper::SendNotificationToStudents($inputs['course_id'], 'file', $material);
            $request->session()->flash('success', __('app.Material Added Successfully'));
            return redirect('instructor/courses/'.$inputs['course_id'] . '/files?type='.$inputs['course_type'] );;
        }
    }


}

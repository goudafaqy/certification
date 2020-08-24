<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Eloquent\CourseRepo;
use App\Http\Repositories\Eloquent\CourseUpdateRepo;
use App\Http\Repositories\Eloquent\UserRepo;
use Illuminate\Http\Request;

class CourseUpdateController extends Controller
{
    var $courseRepo;
    var $userRepo;
    var $courseUpdateRepo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CourseRepo $courseRepo,
        UserRepo $userRepo,
        CourseUpdateRepo $courseUpdateRepo
    )
    {
        $this->courseRepo = $courseRepo;
        $this->userRepo = $userRepo;
        $this->courseUpdateRepo = $courseUpdateRepo;
        $this->middleware(['auth', 'authorize.instructor']);
    }

    public function create(Request $request, $course_id)
    {
        $type = $request->get('type');
        $inputs = $request->input();
        $inputs['course_id'] = $course_id;
        unset($inputs['_token']);

        $result = $this->courseUpdateRepo->save($inputs);
        if ($result) {
            return redirect()->route('instructor-courses-view', [
                'id' => $course_id,
                'type' => $type,
                'tab' => 'update'
            ])->with('added', 'تمت إضافة الإعلان بنجاح');
        }
    }

    public function delete(Request $request, $id)
    {
        $type = $request->get('type');
        $course_id = $request->get('course_id');
        $result = $this->courseUpdateRepo->delete($id);
        if($result){
            return redirect()->route('instructor-courses-view', [
                'id' => $course_id,
                'type' => $type,
                'tab' => 'update'
            ])->with('added', 'تم حذف الإعلان بنجاح');
        }
    }
}

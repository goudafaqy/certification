<?php

namespace App\Http\Controllers;

use App\Http\Helpers\DateHelper;

use App\Http\Repositories\Validation\CourseRatingRepoValidation;
use App\Http\Repositories\Eloquent\CourseRatingRepo;
use App\Http\Repositories\Eloquent\CourseRepo;
use App\Models\Course;
use App\Models\CourseRating;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class CourseRatingController extends Controller
{
    var $courseRepo;
    var $courseRateRepo;
    var $courseRateValidation;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CourseRepo $courseRepo,
        CourseRatingRepo $courseRateRepo,
        CourseRatingRepoValidation $courseRateValidation)
    {
        $this->courseRepo = $courseRepo;
        $this->courseRateRepo = $courseRateRepo;
        $this->courseRateValidation = $courseRateValidation;
        $this->middleware('auth');
    }

    /**
     * List the Course Appointments ...
     */
    public function list($course_id)
    {
        $course         = $this->courseRepo->getById($course_id);
        $ratings   = $course->ratings;
        //return view("cp.appointments.appointments-list", ['course' => $course, 'appointments' => $appointments]);
    }

    public function rate(Request $request)
    {
        $inputs = $request->input();
        $inputs['user_id'] = Auth::id();
        $validator = $this->courseRateValidation->doValidate($inputs, 'insert');
        if ($validator->fails()) {
            return false;
        }else{
            unset($inputs['_token']);
            $rateId = $this->courseRateRepo->save($inputs, true); 
            if($rateId){
                return $inputs['rating'];
            }
        }
    }


    /**
     *
     */
    public function ApproveBulk(Request $request){
        $inputs = $request->input();
        $course_id = $inputs['course_id'];
        $selected_ratings_id = $inputs['id'];
        $this->courseRateRepo->updateBulk(array('approved'=>true),$selected_ratings_id);
        return redirect()->back();
    }

    /**
     * Delete appointment ...
     */
    public function delete($id)
    {
        $rating = $this->courseRateRepo->getById($id);
        $course_id = $rating->course_id;
        $result = $rating->delete($id);
        if($result){
           // return redirect('courses/appointments/'.$course_id)->with('deleted', 'تم حذف الموعد بنجاح');
        }
    }
}

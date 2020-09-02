<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Eloquent\EvaluationRepo;
use App\Http\Repositories\Eloquent\ExamRepo;
use App\Http\Repositories\Eloquent\CourseRepo;
use App\Http\Repositories\Eloquent\QuestionRepo;
use App\Http\Repositories\Eloquent\UserRepo;
use App\Http\Repositories\Validation\ExamRepoValidation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CourseEvaluationsController extends Controller
{
    var $courseRepo;
    var $userRepo;
    var $examRepo;
    var $evaluationRepo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CourseRepo $courseRepo,
        UserRepo $userRepo,
        ExamRepo $examRepo,
        EvaluationRepo $evaluationRepo
    )
    {
        $this->courseRepo = $courseRepo;
        $this->userRepo = $userRepo;
        $this->examRepo = $examRepo;
        $this->evaluationRepo = $evaluationRepo;

        $this->middleware(['auth', 'authorize.instructor']);
    }

    public function saveTerm($course_id, Request $request)
    {
        $type = \request('type');

        $course = $this->courseRepo->getById($course_id);
        if (!$course) throw new NotFoundHttpException();

        $data = $request->input();
        $data['name'] = $data['type'] == 'new' ? $data['name'] : $data['type'];
        $data['course_id'] = $course_id;

        $term = $this->evaluationRepo->save($data);

        if ($term) {
            return redirect()->route('instructor-courses-view', [
                'id' => $course_id,
                'type' => $type,
                'tab' => 'evaluations',
            ])->with('success', "تمت اضافة نوع التقييم بنجاح");
        } else {
            return redirect()->route('instructor-courses-view', [
                'id' => $course_id,
                'type' => $type,
                'tab' => 'evaluations',
            ])->with('fail', "حدث خطأ فى حفظ نوع التقييم");
        }
    }

    public function deleteTerm($course_id, $id)
    {
        $type = \request('type');

        $course = $this->courseRepo->getById($course_id);
        if (!$course) throw new NotFoundHttpException();

        $term = $this->evaluationRepo->getById($id);
        if (!$course) throw new NotFoundHttpException();

        $del = $term->delete();

        if ($del) {
            return redirect()->route('instructor-courses-view', [
                'id' => $course_id,
                'type' => $type,
                'tab' => 'evaluations',
            ])->with('success', "تمت حذف نوع التقييم بنجاح");
        } else {
            return redirect()->route('instructor-courses-view', [
                'id' => $course_id,
                'type' => $type,
                'tab' => 'evaluations',
            ])->with('fail', "حدث خطأ فى حذف نوع التقييم");
        }
    }


    public function saveEvaluations($course_id, Request $request){

        $type = \request('type');

        $course = $this->courseRepo->getById($course_id);
        if (!$course) throw new NotFoundHttpException();

        $data = $request->input();

        $check = $this->evaluationRepo->saveTraineesEvaluations($data['evaluation']);

        if($check){
            return redirect()->route('instructor-courses-view', [
                'id' => $course_id,
                'type' => $type,
                'tab' => 'evaluations',
            ])->with('success', "تمت حفظ التقييم بنجاح");
        } else {
            return redirect()->route('instructor-courses-view', [
                'id' => $course_id,
                'type' => $type,
                'tab' => 'evaluations',
            ])->with('fail', "حدث خطأ فى حفظ التقييم");
        }

    }

}

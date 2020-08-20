<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Helpers\DateHelper;
use App\Http\Repositories\Eloquent\CategoryRepo;
use App\Http\Repositories\Eloquent\ExamRepo;
use App\Http\Repositories\Validation\CourseRepoValidation;
use App\Http\Repositories\Eloquent\CourseRepo;
use App\Http\Repositories\Eloquent\UserRepo;
use App\Http\Repositories\Validation\ExamRepoValidation;
use Illuminate\Http\Request;
use App\Http\Helpers\FileHelper;
use App\Http\Helpers\GenerateHelper;
use App\Http\Repositories\Eloquent\ClassificationRepo;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class CourseExamsController extends Controller
{
    var $courseRepo;
    var $userRepo;
    var $examRepo;
    var $examRepoValidation;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CourseRepo $courseRepo,
        UserRepo $userRepo,
        ExamRepo $examRepo,
        ExamRepoValidation $examRepoValidation
    )
    {
        $this->courseRepo = $courseRepo;
        $this->userRepo = $userRepo;
        $this->examRepo = $examRepo;
        $this->examRepoValidation = $examRepoValidation;
        $this->middleware(['auth', 'authorize.instructor']);
    }

    public function add($course_id)
    {
        $type = \request('type');

        $course = $this->courseRepo->getById($course_id);
        if (!$course) throw new NotFoundHttpException();

        $examType = \request()->route()->getName() == 'instructor-course-assignment-add' ? 'assignment' : 'exam';

        return view("cp.instructor.courses.view", [
            'course' => $course,
            'examType' => $examType,
            'tab' => 'tab6',
            'action' => 'add',
            'type' => $type
        ]);
    }

    public function create(Request $request, $course_id)
    {
        $type = $request->get('type');

        $course = $this->courseRepo->getById($course_id);
        if (!$course) throw new NotFoundHttpException();

        $data = $request->input();
        $data['type'] = $request->get('examType');

        $validator = $this->examRepoValidation->doValidate($data, 'insert');
        if ($validator->fails()) {
            $routeName = $data['type'] == 'assignment' ? 'instructor-course-assignment-add' : 'instructor-course-exam-add';
            return redirect()->route($routeName, ['id' => $course_id, 'type' => $type])->withErrors($validator)->withInput($data);
        }

        $data['course_id'] = $course_id;

        $exam = $this->examRepo->save($data);

        if (!$exam) {
            $routeName = $data['type'] == 'assignment' ? 'instructor-course-assignment-add' : 'instructor-course-exam-add';
            return redirect()->route($routeName, ['id' => $course_id, 'type' => $type])->withErrors('Internal Error')->withInput($data);
        }
        return redirect()->route('instructor-courses-view', [
            'id' => $course->id,
            'type' => $type,
            'tab' => 'exams'
        ])->with('added', 'تمت إضافة امتحان/واجب جديد بنجاح');
    }


}

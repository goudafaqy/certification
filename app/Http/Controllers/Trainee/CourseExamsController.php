<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Eloquent\ExamRepo;
use App\Http\Repositories\Eloquent\CourseRepo;
use App\Http\Repositories\Eloquent\QuestionRepo;
use App\Http\Repositories\Eloquent\UserRepo;
use App\Http\Repositories\Validation\ExamRepoValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Excel;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CourseExamsController extends Controller
{
    var $courseRepo;
    var $userRepo;
    var $examRepo;
    var $questionRepo;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CourseRepo $courseRepo,
        UserRepo $userRepo,
        ExamRepo $examRepo,
        QuestionRepo $questionRepo
    )
    {
        $this->courseRepo = $courseRepo;
        $this->userRepo = $userRepo;
        $this->examRepo = $examRepo;
        $this->questionRepo = $questionRepo;

        $this->middleware(['auth', 'authorize.trainee']);
    }

    public function start($courseId, $examId)
    {
        $course = $this->courseRepo->getById($courseId);
        if (!$course) throw new NotFoundHttpException();

        $exam = $this->examRepo->getById($examId);
        if (!$exam) throw new NotFoundHttpException();

        $userId = Auth::id();

        $userExam = $this->examRepo->getExamUserAnswers($userId, $examId, $exam->questions_no);

        return view("cp.trainee.courses.view", [
            'course' => $course,
            'userExam' => $userExam,
            'tab' => 'tab6',
            'action' => 'show'
        ]);
    }


    public function answer(Request $request, $courseId, $examId){

        dd($request->all(), "TODO");
    }

}

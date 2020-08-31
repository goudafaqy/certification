<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use App\Http\Helpers\DateHelper;
use App\Http\Helpers\FileHelper;
use App\Http\Repositories\Eloquent\ExamRepo;
use App\Http\Repositories\Eloquent\CourseRepo;
use App\Http\Repositories\Eloquent\QuestionRepo;
use App\Http\Repositories\Eloquent\UserRepo;
use App\Http\Repositories\Validation\ExamRepoValidation;
use Carbon\Carbon;
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
        QuestionRepo $questionRepo,
        ExamRepoValidation $examRepoValidation
    )
    {
        $this->courseRepo = $courseRepo;
        $this->userRepo = $userRepo;
        $this->examRepo = $examRepo;
        $this->questionRepo = $questionRepo;
        $this->examRepoValidation = $examRepoValidation;

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


        $currentDate = DateHelper::getCurrentDate();
        return view("cp.trainee.courses.view", [
            'course' => $course, 'currentDate' => $currentDate,
            'userExam' => $userExam,
            'tab' => 'tab6',
            'action' => 'show'
        ]);
    }


    public function submitAnswer(Request $request, $courseId, $examId){

        $course = $this->courseRepo->getById($courseId);
        if (!$course) throw new NotFoundHttpException();

        $exam = $this->examRepo->getById($examId);
        if (!$exam) throw new NotFoundHttpException();

        //check exam started
        $userId = Auth::id();
        $userExam = $this->examRepo->getUserExam($userId, $examId);
        if (!$userExam) {
            return redirect()->route('trainee-courses-view', [
                'id' => $courseId,
                'tab' => 'exams',
            ])->with('invalid', "لم يتم بدأ الامتحان بعد");
        }

        //duration
        $du = Carbon::now()->diffInMinutes(Carbon::make($userExam->start_time));
        if($du> $exam->duration){
            return redirect()->route('trainee-courses-view', [
                'id' => $courseId,
                'tab' => 'exams',
            ])->with('invalid', "لقد تجاوزت المدة المحددة للاختبار ({$exam->duration})");
        }

        //validation
        $data = $request->input();
        $validator = $this->examRepoValidation->doValidate($data, 'exam');
        if ($validator->fails()) {
            return redirect()->route('trainee-course-exam-show', [
                'id' => $courseId,
                'examId' => $examId,
            ])->with('invalid', 'خطأ فى ادخال الاجابات')->withInput($data);
        }

        //upload FU answers
        if($request->allFiles()) {
            foreach ($request->allFiles()['answers'] as $key => $file) {
                $filePath = FileHelper::uploadFiles($file, 'uploads/answers/', "answer_{$userExam->id}_{$key}");
                $data['answers'][$key] = $filePath;
            }
        }

        if(!$this->examRepo->saveExamUserAnswers($userExam->id, $data['answers'])){
            return redirect()->route('trainee-course-exam-show', [
                'id' => $courseId,
                'examId' => $examId,
            ])->with('invalid', 'خطأ فى ادخال الاجابات')->withInput($data);
        }


        if($data['action'] == 'save'){
            return redirect()->route('trainee-course-exam-show', [
                'id' => $courseId,
                'examId' => $examId,
            ])->with('saved', 'تم الحفظ بنجاح');
        }else {

            $userExam->submitted = true;
            $userExam->submit_time = Carbon::now();
            $userExam->save();

            return redirect()->route('trainee-courses-view', [
                'id' => $courseId,
                'tab' => 'exams',
            ])->with('submit', "تم تسليم الاختبار بنجاح");
        }
    }



}

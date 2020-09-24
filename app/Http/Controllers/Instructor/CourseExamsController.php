<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Eloquent\ExamRepo;
use App\Http\Repositories\Eloquent\CourseRepo;
use App\Http\Repositories\Eloquent\QuestionRepo;
use App\Http\Repositories\Eloquent\UserRepo;
use App\Http\Repositories\Validation\ExamRepoValidation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Http\Helpers\GenerateHelper;

class CourseExamsController extends Controller
{
    var $courseRepo;
    var $userRepo;
    var $examRepo;
    var $examRepoValidation;
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
        ExamRepoValidation $examRepoValidation,
        QuestionRepo $questionRepo
    )
    {
        $this->courseRepo = $courseRepo;
        $this->userRepo = $userRepo;
        $this->examRepo = $examRepo;
        $this->examRepoValidation = $examRepoValidation;
        $this->questionRepo = $questionRepo;

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
            'action' => 'form',
            'type' => $type
        ]);
    }

    public function create(Request $request, $course_id)
    {
        $type = $request->get('type');

        $course = $this->courseRepo->getById($course_id);
        if (!$course) throw new NotFoundHttpException();

        $data = $request->input();
        unset($data['_token']);
        unset($data['examType']);
        $data['type'] = $request->get('examType');

        $validator = $this->examRepoValidation->doValidate($data, 'insert');
        if ($validator->fails()) {
            $routeName = $data['type'] == 'assignment' ? 'instructor-course-assignment-add' : 'instructor-course-exam-add';
            return redirect()->route($routeName, ['id' => $course_id, 'type' => $type])->withErrors($validator)->withInput($data);
        }

        $data['course_id'] = $course_id;
        $data['title_en'] = isset($data['title_en']) && $data['title_en'] ? $data['title_en'] : $data['title_ar'];
        $data['guide_en'] = isset($data['guide_en']) && $data['guide_en'] ? $data['guide_en'] : $data['guide_ar'];

        $exam = $this->examRepo->save($data);

        if (!$exam) {
            $routeName = $data['type'] == 'assignment' ? 'instructor-course-assignment-add' : 'instructor-course-exam-add';
            return redirect()->route($routeName, ['id' => $course_id, 'type' => $type])->withErrors('Internal Error')->withInput($data);
        }

        $questionsMsg = "";
        if ($request->hasFile('questions')) {
            $questions = $this->questionRepo->loadExcel($request->file('questions'), $exam->id);
            $qCount = count($questions);

            $questionsMsg = $this->questionRepo->saveMulti($questions) ?
                " مع اضافة ($qCount) سؤال" :
                " مع وجود خطأ فى تسحيل الأسئلة";
        }
        GenerateHelper::SendNotificationToStudents($course_id, $data['type'] );

        return redirect()->route('instructor-courses-view', [
            'id' => $course->id,
            'type' => $type,
            'tab' => 'exams'
        ])->with('added', "تمت إضافة " . ($data['type'] == 'assignment' ? 'واجب' : 'امتحان') . " جديد بنجاح {$questionsMsg}");
    }

    public function edit($course_id, $exam_id)
    {
        $type = \request('type');

        $course = $this->courseRepo->getById($course_id);
        if (!$course) throw new NotFoundHttpException();

        $exam = $this->examRepo->getById($exam_id);
        if (!$exam) throw new NotFoundHttpException();

        if (Carbon::now() >= Carbon::make($exam->start_date_time)) {
            return redirect()->route('instructor-courses-view', [
                'id' => $course_id,
                'type' => $type,
                'tab' => 'exams',
            ])->with('invalid', "لا يمكنك تعديل الامتحان. الامتحان بدأ بالفعل");
        }


        $examType = \request()->route()->getName() == 'instructor-course-assignment-edit' ? 'assignment' : 'exam';

        return view("cp.instructor.courses.view", [
            'course' => $course,
            'examType' => $examType,
            'exam' => $exam,
            'tab' => 'tab6',
            'action' => 'form',
            'type' => $type
        ]);
    }


    public function update(Request $request, $course_id, $exam_id)
    {
        $type = $request->get('type');

        $course = $this->courseRepo->getById($course_id);
        if (!$course) throw new NotFoundHttpException();

        $exam = $this->examRepo->getById($exam_id);
        if (!$exam) throw new NotFoundHttpException();

        if (Carbon::now() >= Carbon::make($exam->start_date_time)) {
            return redirect()->route('instructor-courses-view', [
                'id' => $course_id,
                'type' => $type,
                'tab' => 'exams',
            ])->with('invalid', "لا يمكنك تعديل الامتحان. الامتحان بدأ بالفعل");
        }

        $data = $request->input();
        unset($data['_token']);
        unset($data['examType']);
        $data['type'] = $request->get('examType');

        $validator = $this->examRepoValidation->doValidate($data, 'update');
        if ($validator->fails()) {
            $routeName = $data['type'] == 'assignment' ? 'instructor-course-assignment-edit' : 'instructor-course-exam-edit';
            return redirect()->route($routeName, ['id' => $course_id, 'examId' => $exam_id, 'type' => $type])->withErrors($validator)->withInput($data);
        }

        $data['title_en'] = isset($data['title_en']) && $data['title_en'] ? $data['title_en'] : $data['title_ar'];
        $data['guide_en'] = isset($data['guide_en']) && $data['guide_en'] ? $data['guide_en'] : $data['guide_ar'];

        $this->examRepo->update($data, $exam_id);

        if (!$exam) {
            $routeName = $data['type'] == 'assignment' ? 'instructor-course-assignment-edit' : 'instructor-course-exam-edit';
            return redirect()->route($routeName, ['id' => $course_id, 'examId' => $exam_id, 'type' => $type])->withErrors('Internal Error')->withInput($data);
        }

        $questionsMsg = "";
        if ($request->hasFile('questions')) {
            $questions = $this->questionRepo->loadExcel($request->file('questions'), $exam->id);
            $qCount = count($questions);

            if ($qCount) {
                $this->questionRepo->deleteByExamId($exam_id);
                $questionsMsg = $this->questionRepo->saveMulti($questions) ?
                    " مع اضافة ($qCount) سؤال" :
                    " مع وجود خطأ فى تسحيل الأسئلة";
            }
        }

        return redirect()->route('instructor-courses-view', [
            'id' => $course->id,
            'type' => $type,
            'tab' => 'exams'
        ])->with('added', "تمت تعديل " . ($data['type'] == 'assignment' ? 'الواجب' : 'الامتحان') . " بنجاح {$questionsMsg}");
    }


    public function trainees($course_id, $exam_id)
    {
        $type = \request('type');

        $course = $this->courseRepo->getById($course_id);
        if (!$course) throw new NotFoundHttpException();

        $exam = $this->examRepo->getById($exam_id);
        if (!$exam) throw new NotFoundHttpException();

        if (Carbon::now() < Carbon::make($exam->start_date_time)) {
            return redirect()->route('instructor-courses-view', [
                'id' => $course_id,
                'type' => $type,
                'tab' => 'exams',
            ])->with('invalid', "لم يبدأ الامتحان حتي الان");
        }

        $examType = \request()->route()->getName() == 'instructor-course-assignment-edit' ? 'assignment' : 'exam';

        $trainees = $this->examRepo->getExamTrainees($course, $exam_id);

        return view("cp.instructor.courses.view", [
            'course' => $course,
            'examType' => $examType,
            'exam' => $exam,
            'trainees' => $trainees,
            'tab' => 'tab6',
            'action' => 'trainees',
            'type' => $type
        ]);
    }


    public function trainee_answers($course_id, $exam_id, $traineeId)
    {
        $type = \request('type');

        $course = $this->courseRepo->getById($course_id);
        if (!$course) throw new NotFoundHttpException();

        $exam = $this->examRepo->getById($exam_id);
        if (!$exam) throw new NotFoundHttpException();

        $trainee = $this->userRepo->getById($traineeId);
        if (!$trainee) throw new NotFoundHttpException();

        if (Carbon::now() < Carbon::make($exam->start_date_time)) {
            return redirect()->route('instructor-courses-view', [
                'id' => $course_id,
                'type' => $type,
                'tab' => 'exams',
            ])->with('invalid', "لم يبدأ الامتحان حتي الان");
        }

        $examType = \request()->route()->getName() == 'instructor-course-assignment-edit' ? 'assignment' : 'exam';

        $userExam = $this->examRepo->getUserExam($traineeId, $exam_id);

        return view("cp.instructor.courses.view", [
            'course' => $course,
            'examType' => $examType,
            'exam' => $exam,
            'userExam' => $userExam,
            'tab' => 'tab6',
            'action' => 'trainee-answers',
            'type' => $type
        ]);
    }


    public function review(Request $request, $course_id, $exam_id, $traineeId)
    {
        $type = $request->get('type');

        $course = $this->courseRepo->getById($course_id);
        if (!$course) throw new NotFoundHttpException();

        $exam = $this->examRepo->getById($exam_id);
        if (!$exam) throw new NotFoundHttpException();

        $userExam = $this->examRepo->getUserExam($traineeId, $exam_id);
        if (!$userExam) throw new NotFoundHttpException();

        if (Carbon::now() < Carbon::make($exam->start_date_time)) {
            return redirect()->route('instructor-courses-view', [
                'id' => $course_id,
                'type' => $type,
                'tab' => 'exams',
            ])->with('invalid', "لم يبدأ الامتحان حتي الان");
        }

        $data = $request->input();
        unset($data['_token']);

        $validator = $this->examRepoValidation->doValidate($data, 'grade');
        if ($validator->fails()) {
            $routeName = $exam->type == 'assignment' ? 'instructor-course-assignment-review-trainee' : 'instructor-course-exam-review-trainee';
            return redirect()->route($routeName, [
                'id' => $course_id, 'examId' => $exam_id,
                'traineeId' => $traineeId, 'type' => $type
            ])->withErrors($validator)->withInput($data);
        }


        if (!$this->examRepo->saveExamUserAnswersReview($userExam->id, $data['grades'])) {

            $routeName = $exam->type == 'assignment' ? 'instructor-course-assignment-review-trainee' : 'instructor-course-exam-review-trainee';
            return redirect()->route($routeName, [
                'id' => $course_id, 'examId' => $exam_id,
                'traineeId' => $traineeId, 'type' => $type
            ])->with('invalid', 'خطأ فى ادخال الاجابات')->withInput($data);
        }


        $this->examRepo->markUserExamAsReviewed($userExam->id);

        $routeName = $exam->type == 'assignment' ? 'instructor-course-assignment-trainees' : 'instructor-course-exam-trainees';
        return redirect()->route($routeName, [
            'id' => $course_id, 'examId' => $exam_id, 'type' => $type
        ])->with('submit', "تم تصحيح الاختبار بنجاح");

    }

}

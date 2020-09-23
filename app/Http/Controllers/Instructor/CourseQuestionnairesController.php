<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Eloquent\ExamRepo;
use App\Http\Repositories\Eloquent\CourseRepo;
use App\Http\Repositories\Eloquent\QuestionnaireRepo;
use App\Http\Repositories\Eloquent\QuestionRepo;
use App\Http\Repositories\Eloquent\UserRepo;
use App\Http\Repositories\Validation\ExamRepoValidation;
use App\Models\Questionnaire;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Excel;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CourseQuestionnairesController extends Controller
{
    var $courseRepo;
    var $userRepo;
    var $questionnaireRepo;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CourseRepo $courseRepo,
        UserRepo $userRepo,
        QuestionnaireRepo $questionnaireRepo
    )
    {
        $this->courseRepo = $courseRepo;
        $this->userRepo = $userRepo;
        $this->questionnaireRepo = $questionnaireRepo;

        $this->middleware(['auth', 'authorize.instructor']);
    }

    public function form($course_id, $quest_id = null)
    {
        $type = \request('type');

        $course = $this->courseRepo->getById($course_id);
        if (!$course) throw new NotFoundHttpException();

        $quest = new Questionnaire();
        if(!is_null($quest_id)) {
            $quest = $this->questionnaireRepo->getById($quest_id);
            if (!$quest) throw new NotFoundHttpException();
        }


        return view("cp.instructor.courses.view", [
            'course' => $course,
            'tab' => 'tab4',
            'questionnaire' => $quest,
            'action' => 'form',
            'type' => $type
        ]);
    }



    public function save(Request $request, $course_id)
    {
        $type = \request('type');

        $course = $this->courseRepo->getById($course_id);
        if (!$course) throw new NotFoundHttpException();

        $data = $request->input();
        unset($data['_token']);


        $questionnaire = $this->questionnaireRepo->saveQuestionnaire($data, $course_id, Auth::user()->id);

        if (!$questionnaire) {
            return redirect()->route('instructor-course-questionnaire-form', [
                'id' => $course_id,
                'type' => $type
            ])->with('invalid', 'خظأ فى حفظ البيانات')->withInput($request->input());
        }

        return redirect()->route('instructor-courses-view', [
            'id' => $course->id,
            'type' => $type,
            'tab' => 'questionnaires'
        ])->with('submit', "تمت إضافة الإستبيان بنجاح");

    }



    public function update(Request $request, $course_id, $quest_id)
    {
        $type = \request('type');

        $course = $this->courseRepo->getById($course_id);
        if (!$course) throw new NotFoundHttpException();

        $quest = $this->questionnaireRepo->getById($quest_id);
        if (!$quest) throw new NotFoundHttpException();

        $data = $request->input();
        unset($data['_token']);

        $questionnaire = $this->questionnaireRepo->updateQuestionnaire($data, $quest_id);

        if (!$questionnaire) {
            return redirect()->route('instructor-course-questionnaire-form', [
                'id' => $course_id,
                'questId' => $quest_id,
                'type' => $type
            ])->with('invalid', 'خظأ فى حفظ البيانات')->withInput($request->input());
        }

        return redirect()->route('instructor-courses-view', [
            'id' => $course->id,
            'type' => $type,
            'tab' => 'questionnaires'
        ])->with('submit', "تمت تعديل الإستبيان بنجاح");

    }

    public function delete($course_id, $quest_id)
    {
        $type = \request('type');

        $course = $this->courseRepo->getById($course_id);
        if (!$course) throw new NotFoundHttpException();

        $quest = $this->questionnaireRepo->getById($quest_id);
        if (!$quest) throw new NotFoundHttpException();

        $deleted = $this->questionnaireRepo->delete($quest_id);

        if (!$deleted) {
            return redirect()->route('instructor-courses-view', [
                'id' => $course->id,
                'type' => $type,
                'tab' => 'questionnaires'
            ])->with('invalid', 'خظأ فى حذف الإستبيان');
        }

        return redirect()->route('instructor-courses-view', [
            'id' => $course->id,
            'type' => $type,
            'tab' => 'questionnaires'
        ])->with('added', "تمت تعديل الإستبيان بنجاح");

    }

    public function show($course_id, $quest_id){

        $type = \request('type');

        $course = $this->courseRepo->getById($course_id);
        if (!$course) throw new NotFoundHttpException();

        $quest = $this->questionnaireRepo->getById($quest_id);
        if (!$quest) throw new NotFoundHttpException();


        return view("cp.instructor.courses.view", [
            'course' => $course,
            'tab' => 'tab4',
            'questionnaire' => $quest,
            'action' => 'show',
            'type' => $type
        ]);
    }
}

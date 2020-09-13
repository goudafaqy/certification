<?php

namespace App\Http\Controllers\Trainee;

use App\Http\Controllers\Controller;
use App\Http\Helpers\DateHelper;
use App\Http\Helpers\FileHelper;
use App\Http\Repositories\Eloquent\ExamRepo;
use App\Http\Repositories\Eloquent\CourseRepo;
use App\Http\Repositories\Eloquent\QuestionRepo;
use App\Http\Repositories\Eloquent\SupportRepo;
use App\Http\Repositories\Eloquent\UserRepo;
use App\Http\Repositories\Validation\ExamRepoValidation;
use App\Http\Repositories\Validation\SupportRepoValidation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Excel;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CourseSupportController extends Controller
{
    var $courseRepo;
    var $userRepo;
    var $supportRepo;
    var $supportRepoValidation;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CourseRepo $courseRepo,
        UserRepo $userRepo,
        SupportRepo $supportRepo,
        SupportRepoValidation $supportRepoValidation
    )
    {
        $this->courseRepo = $courseRepo;
        $this->userRepo = $userRepo;
        $this->supportRepo = $supportRepo;
        $this->supportRepoValidation = $supportRepoValidation;


        $this->middleware(['auth', 'authorize.trainee']);
    }


    public function form($courseId)
    {

        $course = $this->courseRepo->getById($courseId);
        if (!$course) throw new NotFoundHttpException();

        $currentDate = DateHelper::getCurrentDate();
        return view("cp.trainee.courses.view", [
            'course' => $course, 'currentDate' => $currentDate,
            'tab' => 'tab9', 'action' => 'form'
        ]);
    }


    public function saveTicket($courseId, Request $request)
    {
        $course = $this->courseRepo->getById($courseId);
        if (!$course) throw new NotFoundHttpException();

        //validation
        $data = $request->input();
        $validator = $this->supportRepoValidation->doValidate($data, 'ticket');
        if ($validator->fails()) {
            return redirect()->route('trainee-course-support-form', [
                'id' => $courseId
            ])->withErrors($validator)->withInput($data);
        }

        $ticket = $this->supportRepo->createTicket($request);

        if (!$ticket) {
            return redirect()->route('trainee-course-support-form', [
                'id' => $courseId
            ])->with('invalid', 'خطأ فى إنشاء التذكرة')->withInput($data);
        }

        return redirect()->route('trainee-courses-view', [
            'id' => $courseId,
            'tab' => 'support',
        ])->with('submit', "تم إنشاء التذكرة بنجاح");

    }


    public function show($courseId, $ticketId)
    {

        $course = $this->courseRepo->getById($courseId);
        if (!$course) throw new NotFoundHttpException();


        $ticket = $this->supportRepo->getById($ticketId);
        if (!$course) throw new NotFoundHttpException();


        $currentDate = DateHelper::getCurrentDate();
        return view("cp.trainee.courses.view", [
            'course' => $course, 'currentDate' => $currentDate,
            'ticket' => $ticket,
            'tab' => 'tab9', 'action' => 'show'
        ]);
    }


    public function saveComment(Request $request, $courseId, $ticketId)
    {

        $course = $this->courseRepo->getById($courseId);
        if (!$course) throw new NotFoundHttpException();


        $ticket = $this->supportRepo->getById($ticketId);
        if (!$course) throw new NotFoundHttpException();

        $data = $request->input();


        if ($ticket->hidden || $ticket->status_id == 5 || $ticket->status_id == 6) {
            return redirect()->route('trainee-course-support-show', [
                'id' => $courseId,
                'ticketId' => $ticketId
            ])->with('invalid', 'عفوا لم تستطيع اضافة رد')->withInput($data);

        }

        //validation
        $validator = $this->supportRepoValidation->doValidate($data, 'comment');
        if ($validator->fails()) {
            return redirect()->route('trainee-course-support-show', [
                'id' => $courseId,
                'ticketId' => $ticketId
            ])->withErrors($validator)->withInput($data);
        }

        $comment = $this->supportRepo->addComment($request, $ticket);

        if (!$comment) {
            return redirect()->route('trainee-course-support-show', [
                'id' => $courseId,
                'ticketId' => $ticketId
            ])->with('invalid', 'خطأ فى إضافة الرد')->withInput($data);
        }

        return redirect()->route('trainee-course-support-show', [
            'id' => $courseId,
            'ticketId' => $ticketId
        ])->with('submit', "تم إضافة الرد بنجاح");
    }

}

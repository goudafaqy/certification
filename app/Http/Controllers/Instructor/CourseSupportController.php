<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Helpers\DateHelper;
use App\Http\Repositories\Eloquent\CourseRepo;
use App\Http\Repositories\Eloquent\SupportRepo;
use App\Http\Repositories\Eloquent\UserRepo;
use App\Http\Repositories\Validation\SupportRepoValidation;
use Illuminate\Http\Request;
use PanicHD\PanicHD\Models\Category;
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


        $this->middleware(['auth', 'authorize.instructor']);
    }


    public function form($courseId)
    {
        $type = \request('type');

        $course = $this->courseRepo->getById($courseId);
        if (!$course) throw new NotFoundHttpException();

        $currentDate = DateHelper::getCurrentDate();
        return view("cp.instructor.courses.view", [
            'course' => $course, 'currentDate' => $currentDate,
            'categories' => Category::all(),
            'tab' => 'tab9', 'action' => 'form',
            'type' => $type
        ]);
    }


    public function saveTicket($courseId, Request $request)
    {
        $type = \request('type');
        $course = $this->courseRepo->getById($courseId);
        if (!$course) throw new NotFoundHttpException();

        //validation
        $data = $request->input();
        $validator = $this->supportRepoValidation->doValidate($data, 'ticket');
        if ($validator->fails()) {
            return redirect()->route('instructor-course-support-form', [
                'id' => $courseId,
                'type' => $type
            ])->withErrors($validator)->withInput($data);
        }

        $ticket = $this->supportRepo->createTicket($request);

        if (!$ticket) {
            return redirect()->route('instructor-course-support-form', [
                'id' => $courseId,
                'type' => $type
            ])->with('invalid', 'خطأ فى إنشاء التذكرة')->withInput($data);
        }

        return redirect()->route('instructor-courses-view', [
            'id' => $courseId,
            'tab' => 'support',
            'type' => $type
        ])->with('submit', "تم إنشاء التذكرة بنجاح");

    }


    public function show($courseId, $ticketId)
    {
        $type = \request('type');

        $course = $this->courseRepo->getById($courseId);
        if (!$course) throw new NotFoundHttpException();


        $ticket = $this->supportRepo->getById($ticketId);
        if (!$course) throw new NotFoundHttpException();


        $currentDate = DateHelper::getCurrentDate();
        return view("cp.instructor.courses.view", [
            'course' => $course, 'currentDate' => $currentDate,
            'ticket' => $ticket,
            'tab' => 'tab9', 'action' => 'show',
            'type' => $type
        ]);
    }


    public function saveComment(Request $request, $courseId, $ticketId)
    {
        $type = \request('type');

        $course = $this->courseRepo->getById($courseId);
        if (!$course) throw new NotFoundHttpException();


        $ticket = $this->supportRepo->getById($ticketId);
        if (!$course) throw new NotFoundHttpException();

        $data = $request->input();


        if ($ticket->hidden || $ticket->status_id == 5 || $ticket->status_id == 6) {
            return redirect()->route('instructor-course-support-show', [
                'id' => $courseId,
                'ticketId' => $ticketId,
                'type' => $type
            ])->with('invalid', 'عفوا لم تستطيع اضافة رد')->withInput($data);

        }

        //validation
        $validator = $this->supportRepoValidation->doValidate($data, 'comment');
        if ($validator->fails()) {
            return redirect()->route('instructor-course-support-show', [
                'id' => $courseId,
                'ticketId' => $ticketId,
                'type' => $type
            ])->withErrors($validator)->withInput($data);
        }

        $comment = $this->supportRepo->addComment($request, $ticket);

        if (!$comment) {
            return redirect()->route('instructor-course-support-show', [
                'id' => $courseId,
                'ticketId' => $ticketId,
                'type' => $type
            ])->with('invalid', 'خطأ فى إضافة الرد')->withInput($data);
        }

        return redirect()->route('instructor-course-support-show', [
            'id' => $courseId,
            'ticketId' => $ticketId,
            'type' => $type
        ])->with('submit', "تم إضافة الرد بنجاح");
    }

}

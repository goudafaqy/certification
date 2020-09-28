<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use PanicHD\PanicHD\Models\Ticket;
use Illuminate\Support\Facades\Auth;

use App\Http\Helpers\DateHelper;
use App\Http\Repositories\Eloquent\CourseRepo;
use App\Http\Repositories\Eloquent\SupportRepo;
use App\Http\Repositories\Eloquent\UserRepo;
use App\Http\Repositories\Validation\SupportRepoValidation;
use PanicHD\PanicHD\Models\Category;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class HelpDeskController extends Controller{
  var $courseRepo;
  var $userRepo;
  var $supportRepo;
  var $supportRepoValidation;

  public function __construct(
    CourseRepo $courseRepo,
    UserRepo $userRepo,
    SupportRepo $supportRepo,
    SupportRepoValidation $supportRepoValidation)
    {
    $this->courseRepo = $courseRepo;
    $this->userRepo = $userRepo;
    $this->supportRepo = $supportRepo;
    $this->supportRepoValidation = $supportRepoValidation;
    $this->middleware('auth');
    }
  public function showhelpDesk(){
        $tickets = Ticket::where('user_id', Auth::user()->id)->get();
        return view("cp.helpdesk.helpdesk-view", ['tickets' => $tickets,'categories' => Category::all()]);
  }
  
  public function form(){
      $currentDate = DateHelper::getCurrentDate();
      return view("cp.helpdesk.helpdesk-form", [ 'categories' => Category::all()]);
  }


  public function saveTicket(Request $request)
  {
      $data = $request->input();
      $validator = $this->supportRepoValidation->doValidate($data, 'ticket');
      if ($validator->fails()) {
          return redirect()->route('cp.helpdesk.helpdesk-form',['categories' => Category::all()])->withErrors($validator)->withInput($data);
      }

      $ticket = $this->supportRepo->createTicket($request);
      if (!$ticket) 
          return redirect()->route('cp.helpdesk.helpdesk-form', ['categories' => Category::all()])->with('invalid', 'خطأ فى إنشاء التذكرة')->withInput($data);
      $request->session()->flash('success', "تم إنشاء التذكرة بنجاح");
      return $this->showhelpDesk();

  }


  public function show($ticketId)
  {
      $ticket = $this->supportRepo->getById($ticketId);
      return view("cp.helpdesk.ticket_view", ['categories' => Category::all(),'ticket' => $ticket      ]);
  }


  public function saveComment(Request $request,  $ticketId)
  {
      $ticket = $this->supportRepo->getById($ticketId);
      if (!$course) throw new NotFoundHttpException();

      $data = $request->input();


      if ($ticket->hidden || $ticket->status_id == 5 || $ticket->status_id == 6) {
          return redirect()->route('cp.helpdesk.helpdesk-view', [
              'ticketId' => $ticketId,
             ])->with('error', 'عفوا لم تستطيع اضافة رد')->withInput($data);

      }

      //validation
      $validator = $this->supportRepoValidation->doValidate($data, 'comment');
      if ($validator->fails()) {
          return redirect()->route('cp.helpdesk.helpdesk-view', [
              'ticketId' => $ticketId,
          ])->withErrors($validator)->withInput($data);
      }

      $comment = $this->supportRepo->addComment($request, $ticket);

      if (!$comment) {
          return redirect()->route('cp.helpdesk.helpdesk-view', [
              'ticketId' => $ticketId,
             ])->with('error', 'خطأ فى إضافة الرد')->withInput($data);
      }

      return redirect()->route('cp.helpdesk.helpdesk-view', [
          'ticketId' => $ticketId,
      ])->with('success', "تم إضافة الرد بنجاح");
  }

}

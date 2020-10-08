<?php

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\ExamEloquent;
use App\Http\Interfaces\Eloquent\SupportEloquent;
use App\Models\EvaluationTerm;
use App\Models\EvaluationTermUser;
use App\Models\Exam;
use App\Models\ExamUser;
use App\Models\ExamUserAnswer;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PanicHD\PanicHD\Events\CommentCreated;
use PanicHD\PanicHD\Events\TicketCreated;
use PanicHD\PanicHD\Models\Comment;
use PanicHD\PanicHD\Models\Priority;
use PanicHD\PanicHD\Models\Setting;
use PanicHD\PanicHD\Models\Ticket;
use PanicHD\PanicHD\Traits\Attachments;

class SupportRepo extends Repository implements SupportEloquent
{
    use Attachments;

    public function __construct()
    {
        parent::__construct(new Ticket());
    }


    public function createTicket($request)
    {


        DB::beginTransaction();
        $ticket = new Ticket();

        $ticket->subject = $request->subject;
        $ticket->creator_id = Auth::user()->id;
        $ticket->user_id = Auth::user()->id;

        $ticket->status_id = Setting::grab('default_status_id');
        $default_priority_id = Setting::grab('default_priority_id');
        $ticket->priority_id = $default_priority_id == 0 ? Priority::first()->id : $default_priority_id;

        $ticket->start_date = Carbon::now();
        $ticket->limit_date = null;

        $ticket->category_id = 1;

        $ticket->autoSelectAgent();

        $ticket->content = $request->content;
        $ticket->html = "<p>" . $request->content . "</p>";

        $ticket->read_by_agent = 0;

        $r = $ticket->save();
        if (!$r) return false;

        $a_result_errors = false;
        $attachmentsError = $this->saveAttachments(compact('request', 'ticket', 'a_result_errors'));

        if ($attachmentsError !== false) return false;

        DB::commit();

        event(new TicketCreated($ticket));

        return $ticket;

    }


    public function addComment($request, $ticket)
    {
        try {
            DB::beginTransaction();
            $comment = new Comment();

            $comment->type = 'reply';
            $comment->content = $request->content;
            $comment->html = "<p>" . $request->content . "</p>";
            $comment->user_id = Auth::user()->id;
            $comment->ticket_id = $ticket->id;

            $ticket->read_by_agent = 0;
            $comment->read_by_agent = 0;

            $r = $comment->save();
            if (!$r) return false;

            $ticket->updated_at = $comment->created_at;

            $r = $ticket->save();
            if (!$r) return false;

            $a_result_errors = false;
            $attachmentsError = $this->saveAttachments(compact('request', 'a_result_errors', 'ticket', 'comment'));

            if ($attachmentsError !== false) return false;

            DB::commit();

            event(new CommentCreated(clone $comment, $request));
        }catch (\Throwable $e){
            DB::rollBack();
            return false;
        }


        return $ticket;

    }


}

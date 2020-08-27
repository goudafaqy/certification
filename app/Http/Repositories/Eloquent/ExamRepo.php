<?php

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\ExamEloquent;
use App\Models\Exam;
use App\Models\ExamUser;
use App\Models\ExamUserAnswer;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ExamRepo extends Repository implements ExamEloquent
{
    public function __construct()
    {
        parent::__construct(new Exam());
    }

    public function getAll($course_id = '')
    {
        return Exam::where('course_id', $course_id)->get();
    }

    public function getExamsForTrainee($course_id, $user_id)
    {
        $exams = Exam::where('course_id', $course_id)->orderBy('exam_date', 'DESC')->get();
        foreach ($exams as &$exam) {
            $exam->status = 0; // Not Started
            $exam->user_start_time = false;
            $exam->time_spent = false;

            $userExam = ExamUser::where([
                'exam_id' => $exam->id,
                'user_id' => $user_id
            ])->first();

            if($userExam) {
                $exam->user_start_time = $userExam->start_time;
            }

            if ($exam->exam_date < date("Y-m-d")
                || ($exam->exam_date == date("Y-m-d") && $exam->end_time <= date("H:i"))) {
                $exam->status = 1; // Finished

                if($userExam && $userExam->submitted) {
                    $exam->time_spent = Carbon::make($userExam->submit_time)
                        ->diffInMinutes(Carbon::make($userExam->start_time));
                }
            }
            elseif ($exam->exam_date == date('Y-m-d')
                && $exam->start_time <= date("H:i")
                && $exam->end_time > date("H:i")) {

                $exam->status = 2; //exam available and not started yet

                if($userExam){
                    $exam->status = 3; //user start the exam

                    if($userExam->submitted) {
                        $exam->status = 4; //user submit the exam
                        $exam->time_spent = Carbon::make($userExam->submit_time)
                            ->diffInMinutes(Carbon::make($userExam->start_time));
                    }
                }
            }

        }
        return $exams;
    }


    public function getExamUserAnswers($user_id, $exam_id, $questionCount)
    {

        $examUser = $this->getUserExam($user_id, $exam_id);

        if (!$examUser) {

            $examUser = ExamUser::create([
                'user_id' => $user_id,
                'exam_id' => $exam_id,
                'start_time' => date("Y-m-d H:i:s"),
                'submitted' => false,
            ]);

            $questions = Question::where('exam_id', $exam_id)->get(['type', 'id', 'type_OC'])
                ->random($questionCount)->shuffle()->keyBy('id');

            $questionItems = [];
            foreach ($questions as $question_id => $question) {
                $questionItems[] = [
                    'course_exam_user_id' => $examUser->id,
                    'question_id' => $question_id,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                ];
            }

            ExamUserAnswer::insert($questionItems);
        }

        return $examUser;
    }

    public function getUserExam($user_id, $exam_id)
    {
        return ExamUser::where([
            'user_id' => $user_id,
            'exam_id' => $exam_id
        ])->first();
    }

    public function saveExamUserAnswers($userExamId, $answers)
    {
        $userExamQuestions = ExamUserAnswer::where('course_exam_user_id', $userExamId)->get()->keyBy('id');

        try {
            DB::beginTransaction();
            foreach ($answers as $userExam_id => $answer) {
                $userExamQuestion = $userExamQuestions[$userExam_id];

                if ($userExamQuestion->question->type == 'MC') {
                    $userExamQuestion->answer_MC = json_encode($answer);
                } elseif ($userExamQuestion->question->type == 'TF') {
                    $userExamQuestion->answer_TF = $answer;
                } elseif ($userExamQuestion->question->type == 'OC' && $userExamQuestion->question->type_OC == 'FT') {
                    $userExamQuestion->answer_FT = $answer;
                } elseif ($userExamQuestion->question->type == 'OC' && $userExamQuestion->question->type_OC == 'FU') {
                    $userExamQuestion->answer_FU = $answer;
                }

                $userExamQuestion->save();
            }
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            return false;
        }

        return true;

    }

}

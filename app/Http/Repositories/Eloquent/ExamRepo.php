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
            $exam->reviewed = false;
            $exam->exam_grade = false;

            $userExam = ExamUser::where([
                'exam_id' => $exam->id,
                'user_id' => $user_id
            ])->first();

            if ($userExam) {
                $exam->user_start_time = $userExam->start_time;
                $exam->reviewed = $userExam->reviewed;
                if ($exam->reviewed) {
                    $exam->exam_grade = $userExam->getExamGrade();
                }
            }

            if ($exam->exam_date < date("Y-m-d")
                || ($exam->exam_date == date("Y-m-d") && $exam->end_time <= date("H:i"))) {
                /*
                 * exam finished
                 */

                $exam->status = 1;

                if ($userExam && $userExam->submitted) {
                    $exam->time_spent = Carbon::make($userExam->submit_time)
                        ->diffInMinutes(Carbon::make($userExam->start_time));
                }
            } elseif ($exam->exam_date == date('Y-m-d')
                && $exam->start_time <= date("H:i")
                && $exam->end_time > date("H:i")) {
                /*
                 * exam Available
                 */

                $exam->status = 2;

                if ($userExam) {
                    /*
                     * exam Started
                     */
                    $exam->status = 3;

                    if ($userExam->submitted) {
                        /*
                         * exam Submitted
                         */

                        $exam->status = 4;
                        $exam->time_spent = Carbon::make($userExam->submit_time)
                            ->diffInMinutes(Carbon::make($userExam->start_time));

                    } elseif (Carbon::now()->diffInMinutes(Carbon::make($userExam->start_time)) > $exam->duration) {
                        /*
                         * exam Duration ended
                         */

                        $exam->status = 1; // finished
                        $exam->time_spent = $exam->duration;
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

    public function getExamTrainees($course, $exam_id)
    {

        $examinedStudents = ExamUser::where('exam_id', $exam_id)->get()->keyBy('user_id');

        $trainees = [];
        foreach ($course->students as $student) {
            if (isset($examinedStudents[$student->id])) {

                $answered = 0;
                foreach ($examinedStudents[$student->id]->userQuestions as $userQuestion)
                    $answered += $userQuestion->answered ? 1 : 0;

                $trainees[] = [
                    'id' => $student->id,
                    'name' => $student->name,
                    'hasExam' => true,
                    'status' => $examinedStudents[$student->id]->reviewed? 2: 0,
                    'userExam' => $examinedStudents[$student->id],
                    'numAnswered' => $answered
                ];
            } else {
                $trainees[] = [
                    'id' => $student->id,
                    'name' => $student->name,
                    'hasExam' => false,
                    'status' => 1
                ];
            }

        }

        $trainees = collect($trainees)->sortBy('status')->toArray();
        return $trainees;
    }



    public function saveExamUserAnswersReview($userExamId, $grades)
    {
        $userExamQuestions = ExamUserAnswer::where('course_exam_user_id', $userExamId)->get()->keyBy('id');

        try {
            DB::beginTransaction();
            foreach ($grades as $userExam_id => $grade) {
                $userExamQuestion = $userExamQuestions[$userExam_id];

                $userExamQuestion->graded = true;
                $userExamQuestion->grade = $grade;
                $userExamQuestion->save();
            }
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            return false;
        }

        return true;

    }

    public function markUserExamAsReviewed($userExamId){
        ExamUser::where('id', $userExamId)->update([
            'reviewed' => true,
            'reviewed_date' => Carbon::now()
        ]);
    }



}

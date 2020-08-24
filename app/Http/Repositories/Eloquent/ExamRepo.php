<?php

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\ExamEloquent;
use App\Models\Exam;
use App\Models\ExamUser;
use App\Models\ExamUserAnswer;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ExamRepo implements ExamEloquent
{

    public function getAll($course_id = '')
    {
        return Exam::where('course_id', $course_id)->get();
    }

    public function getById($id)
    {
        return Exam::where('id', $id)->first();
    }


    public function save($inputs, $getId = false)
    {
        return ($getId) ? Exam::insertGetId($inputs) : Exam::create($inputs);
    }

    public function update($inputs, $id)
    {
        return Exam::where('id', $id)->update($inputs);
    }


    public function delete($id)
    {
        return Exam::where('id', $id)->delete();
    }


    public function getExamsForTrainees($course_id = '')
    {
        $exams = Exam::where('course_id', $course_id)->orderBy('exam_date', 'DESC')->get();
        foreach ($exams as &$exam) {
            $status = 0; // Not Started

            if($exam->exam_date < date("Y-m-d")
                || ($exam->exam_date == date("Y-m-d") && $exam->end_time < date("H:i"))){
                $status = 1; // Finished
            }


            if($exam->exam_date == date('Y-m-d')
                && $exam->start_time < date("H:i")
                && $exam->end_time > date("H:i")){

                $status = 2; //exam available

                //$status = 3; //user submit the exam

            }

            $exam->status = $status;
        }
        return $exams;
    }


    public function getExamUserAnswers($user_id, $exam_id, $questionCount){

        $examUser = ExamUser::where([
            'user_id' => $user_id,
            'exam_id' => $exam_id
        ])->first();

        if(!$examUser) {

            $examUser = ExamUser::create([
                'user_id' => $user_id,
                'exam_id' => $exam_id,
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

}

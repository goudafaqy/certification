<?php

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\ExamEloquent;
use App\Models\EvaluationTerm;
use App\Models\EvaluationTermUser;
use App\Models\Exam;
use App\Models\ExamUser;
use App\Models\ExamUserAnswer;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EvaluationRepo extends Repository implements ExamEloquent
{
    public function __construct()
    {
        parent::__construct(new EvaluationTerm());
    }

    public function getByCourse($course_id, $with = false)
    {
        return EvaluationTerm::where('course_id', $course_id)->get();
    }


    function getEvaluationTotalScore($exams, $evaluations)
    {
        $total = 0;
        foreach ($exams as $exam) {
            $total += $exam->full_mark;
        }
        foreach ($evaluations as $term) {
            $total += $term->score;
        }
        return $total;
    }


    function getTraineesScores($trainees, $exams, $evaluations)
    {
        $trainees = $trainees->toArray();
        $data = [];
        foreach ($trainees as $trainee) {
            $trainee['total_grade'] = 0;
            $trainee['exams'] = [];
            foreach ($exams as $exam) {
                $userExam = ExamUser::where([
                    'user_id' => $trainee['id'],
                    'exam_id' => $exam->id
                ])->first();
                if ($userExam) {
                    $trainee['exams'][$exam->id] = $userExam->getExamGrade();
                }
                $trainee['exams'][$exam->id] = $userExam ? $userExam->getExamGrade() : 0;

                $trainee['total_grade'] += $trainee['exams'][$exam->id];
            }

            $trainee['evaluations'] = [];
            foreach ($evaluations as $evaluation) {
                $userEvaluation = EvaluationTermUser::where([
                    'user_id' => $trainee['id'],
                    'evaluation_term_id' => $evaluation->id
                ])->first();
                $trainee['evaluations'][$evaluation->id] = $userEvaluation ? $userEvaluation->score : 0;
                $trainee['total_grade'] += $trainee['evaluations'][$evaluation->id];
            }

            $data[] = $trainee;
        }

        return $data;
    }


    public function saveTraineesEvaluations($evaluations){
        try {
            DB::beginTransaction();
            foreach ($evaluations as $traineeId => $scores){
                foreach ($scores as $termId => $score){
                    $userTerm = EvaluationTermUser::where([
                        'user_id' => $traineeId,
                        'evaluation_term_id' => $termId
                    ])->first();

                    if($userTerm){
                        $userTerm->score = $score;
                        $userTerm->save();
                    }else{
                        EvaluationTermUser::create([
                            'user_id' => $traineeId,
                            'evaluation_term_id' => $termId,
                            'score' => $score
                        ]);
                    }
                }
            }
            DB::commit();
        } catch (\Throwable $e) {
            dd($e->getMessage());
            DB::rollback();
            return false;
        }

        return true;
    }

}

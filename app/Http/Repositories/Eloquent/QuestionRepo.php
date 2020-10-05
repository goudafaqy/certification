<?php

namespace App\Http\Repositories\Eloquent;

use App\Http\Interfaces\Eloquent\QuestionEloquent;
use App\Models\Question;
use Maatwebsite\Excel\Concerns\Importable;

class QuestionRepo extends Repository implements QuestionEloquent
{
    use Importable;

    public function __construct()
    {
        parent::__construct(new Question());
    }

    public function getAll($course_id = '')
    {
        return Question::where('exam_id', $course_id)->get();
    }

    function saveMulti($questions)
    {
        return Question::insert($questions);
    }

    function deleteByExamId($examId)
    {
        return Question::where('exam_id', $examId)->delete();
    }

    function loadExcel($file, $exam_id)
    {
        $questionsList = $this->toArray($file);
        if (!isset($questionsList[0]))
            return false;

        $questionsList = $questionsList[0];
        if (count($questionsList) == 0)
            return false;

        $questions = [];
        foreach ($questionsList as $row) {
            if ($q = $this->getQuestionFromExcel($row, $exam_id)) {
                $questions[] = $q;
            }
        }

        return $questions;
    }

    public function getQuestionFromExcel($row, $exam_id)
    {
        if (!$row[0] || !$row[1]) return false;

        if (!in_array($row[0], ['MC', 'TF', 'OC'])) return false;

        $mcAnswers = null;
        $tfAnswer = null;
        $ocType = null;

        if ($row[0] == 'TF') $tfAnswer = ($row[2] == 'TRUE');
        elseif ($row[0] == 'OC') $ocType = $row[2];
        elseif ($row[0] == 'MC') {
            $c = count($row);
            $answers = [];
            for ($i = 2; $i < $c; $i += 2) {
                if (!isset($row[$i]) || !$row[$i] ||
                    !isset($row[$i + 1]) || !$row[$i + 1])
                    continue;

                $answers[$row[$i]] = $row[$i + 1] == 'CORRECT';
            }

            if (count($answers) == 0) return false;

            $mcAnswers = json_encode($answers);
        }

        return [
            'exam_id' => $exam_id,
            'type' => $row[0],
            'question_ar' => $row[1],
            'question_en' => $row[1],
            'answer_MC' => $mcAnswers,
            'answer_TF' => $tfAnswer,
            'type_OC' => $ocType
        ];
    }
}

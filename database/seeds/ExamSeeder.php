<?php

use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create Exam
        DB::table('course_exams')->insert([
            'course_id' => 1,
            'title_ar' => 'الامتحان الاول',
            'title_en' => 'Exam 1',
            'guide_ar' => 'الامتحان الاول العام',
            'guide_en' => 'Annual Exam 1',
            'type' => 'exam',
            'exam_date' => \Carbon\Carbon::now()->format('Y-m-d'),
            'questions_no' => '5',
            'question_point' => 1,
            'start_time' => '00:00',
            'end_time' => '23:59',
            'duration' => '20'
        ]);

        //questions
        $this->createMCQuestion(1, 'السؤال ا MC');
        $this->createMCQuestion(1, 'السؤال ٢ MC');
        $this->createMCQuestion(1, 'السؤال ٣ MC');
        $this->createTFQuestion(1, 'السؤال ١ TF', true);
        $this->createTFQuestion(1, 'السؤال ٢ TF', true);
        $this->createTFQuestion(1, 'السؤال ٣ TF', false);
        $this->createOCQuestion(1, 'السؤال FT', 'FT');
        $this->createOCQuestion(1, 'السؤال FU', 'FU');


        //assign the course To a Trainee
        $this->assignCourseToTrainee(1, 3);
        $this->assignCourseToTrainee(1, 4);
        $this->assignCourseToTrainee(1, 5);
        $this->assignCourseToTrainee(1, 6);
    }


    function createMCQuestion($examId, $title)
    {

        DB::table('course_exam_questions')->insert([
            'exam_id' => $examId,
            'question_ar' => $title,
            'question_en' => $title,
            'type' => 'MC',
            'answer_MC' => '{"choice1":true,"choice2":false,"choice3":false,"choice4":false}',
        ]);
    }

    function createTFQuestion($examId, $title, $answer)
    {

        DB::table('course_exam_questions')->insert([
            'exam_id' => $examId,
            'question_ar' => $title,
            'question_en' => $title,
            'type' => 'TF',
            'answer_TF' => $answer
        ]);
    }

    function createOCQuestion($examId, $title, $type)
    {

        DB::table('course_exam_questions')->insert([
            'exam_id' => $examId,
            'question_ar' => $title,
            'question_en' => $title,
            'type' => 'OC',
            'type_OC' => $type
        ]);
    }

    function assignCourseToTrainee($course_id, $user_id)
    {
        DB::table('course_user')->insert([
            'user_id' => $user_id,
            'course_id' => $course_id
        ]);

    }
}

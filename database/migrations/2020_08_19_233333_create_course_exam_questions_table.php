<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseExamQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_exam_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("exam_id")->references('id')
                ->on('course_exams')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('type', ['MC', 'TF', 'OC']);
            $table->string('question_en');
            $table->string('question_ar');
            $table->text('answer_MC')->nullable();
            $table->boolean('answer_TF')->nullable();
            $table->enum('type_OC', ['FT', 'FU'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_exam_questions');
    }
}

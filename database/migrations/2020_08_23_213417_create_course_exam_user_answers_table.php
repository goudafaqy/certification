<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseExamUserAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_exam_user_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId("course_exam_user_id")->references('id')
                ->on('course_exam_user')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("question_id")->references('id')
                ->on('course_exam_questions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->tinyInteger("answer_MC")->nullable();
            $table->boolean("answer_TF")->nullable();
            $table->text("answer_FT")->nullable();
            $table->string("answer_FU")->nullable();
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
        Schema::dropIfExists('course_exam_user_answers');
    }
}

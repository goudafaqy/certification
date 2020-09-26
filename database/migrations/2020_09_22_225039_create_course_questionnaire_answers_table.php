<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseQuestionnaireAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_questionnaire_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->references('id')
                ->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("questionnaire_id")->references('id')
                ->on('course_questionnaires')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("question_id")->references('id')
                ->on('course_questionnaire_questions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('answer');
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
        Schema::dropIfExists('course_questionnaire_answers');
    }
}

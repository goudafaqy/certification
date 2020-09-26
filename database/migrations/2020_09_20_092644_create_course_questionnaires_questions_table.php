<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseQuestionnairesQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_questionnaire_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("questionnaire_id")->references('id')
                ->on('course_questionnaires')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('type', ['SC', 'MC', 'NM']);
            $table->string('question');
            $table->text('choices')->nullable();
            $table->tinyInteger('min_num')->nullable();
            $table->tinyInteger('max_num')->nullable();
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
        Schema::dropIfExists('course_questionnaire_questions');
    }
}

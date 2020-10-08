<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseExamUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_exam_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->references('id')
                ->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("exam_id")->references('id')
                ->on('course_exams')->cascadeOnDelete()->cascadeOnUpdate();
            $table->dateTime("start_time");
            $table->dateTime("submit_time")->nullable();
            $table->boolean("submitted")->default(false);
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
        Schema::dropIfExists('course_exam_user');
    }
}

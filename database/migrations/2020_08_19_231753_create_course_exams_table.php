<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId("course_id")->references('id')
                ->on('courses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('type', ['exam', 'assignment']);
            $table->string('title_ar');
            $table->string('title_en')->nullable();
            $table->date('exam_date');
            $table->text('guide_ar')->nullable();
            $table->text('guide_en')->nullable();
            $table->integer("duration");
            $table->integer("questions_no");
            $table->integer("question_point");
            $table->string("start_time");
            $table->string("end_time");
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
        Schema::dropIfExists('course_exams');
    }
}

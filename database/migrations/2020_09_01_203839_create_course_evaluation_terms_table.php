<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseEvaluationTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_evaluation_terms', function (Blueprint $table) {
            $table->id();
            $table->foreignId("course_id")->references('id')
                ->on('courses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->float("score");
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
        Schema::dropIfExists('course_evaluation_terms');
    }
}

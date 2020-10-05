<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseEvaluationUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_evaluation_term_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->references('id')
                ->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("evaluation_term_id")->references('id')
                ->on('course_evaluation_terms')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('course_evaluation_term_user');
    }
}

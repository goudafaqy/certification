<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_questionnaires', function (Blueprint $table) {
            $table->id();
            $table->foreignId("course_id")->references('id')
                ->on('courses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("user_id")->references('id')
                ->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->string('details');
            $table->enum('type', ['instructor', 'certification']);
            $table->date('publish_date');
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
        Schema::dropIfExists('course_questionnaires');
    }
}

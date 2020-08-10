<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalColumnsToCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->char('pass_unit');
            $table->float('pass_grade');
            $table->char('skill_level');
            $table->date('reg_start_date');
            $table->date('reg_end_date');
            $table->integer('lec_num')->default(0);
            $table->integer('course_hours')->default(0);
            $table->integer('course_days')->default(0);
            $table->boolean('assi_check')->default(false);
            $table->boolean('exam_check')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            //
        });
    }
}

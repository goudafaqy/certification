<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterExamsTablesToAddExamReviewModuleFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_exam_user', function (Blueprint $table) {
            $table->boolean('reviewed')->default(false);
            $table->dateTime('reviewed_date')->nullable();
        });

        Schema::table('course_exam_user_answers', function (Blueprint $table) {
            $table->boolean('graded')->default(false);
            $table->integer('grade')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_exam_user', function (Blueprint $table) {
            $table->dropColumn([
                'reviewed',
                'reviewed_date'
            ]);
        });

        Schema::table('course_exam_user_answers', function (Blueprint $table) {
            $table->dropColumn([
                'graded',
                'grade'
            ]);
        });
    }
}

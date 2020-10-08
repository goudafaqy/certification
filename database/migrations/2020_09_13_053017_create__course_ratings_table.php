<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_ratings', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId("course_id")->references('id')
                ->on('courses')->cascadeOnDelete()->cascadeOnUpdate();
            
            $table->foreignId("user_id")->references('id')
                ->on('users')->cascadeOnDelete()->cascadeOnUpdate();    
            $table->text('review')->nullable();
            $table->boolean("approved")->default(false);
            $table->integer("rating");
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
        Schema::table('courses_ratings', function (Blueprint $table) {
            //
        });
    }
}

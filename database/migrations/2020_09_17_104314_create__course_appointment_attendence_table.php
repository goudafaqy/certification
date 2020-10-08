<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseAppointmentAttendenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Course_Appointment_Attendence', function (Blueprint $table) {
            $table->id();
            $table->foreignId("appointment_id")->references('id')
                ->on('courses_appointments')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("user_id")->references('id')
                ->on('users')->cascadeOnDelete()->cascadeOnUpdate();    
            $table->dateTime('attand_time')->nullable();
            $table->dateTime('StartattandanceTime')->nullable();
            $table->integer('SessionID');
            $table->integer('SessionCode');
            $table->integer('duration')->nullable();
            $table->boolean("active")->default(true);
            $table->boolean("attand")->default(false);
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
        Schema::table('Course_Appointment_Attendence', function (Blueprint $table) {
            //
        });
    }
}

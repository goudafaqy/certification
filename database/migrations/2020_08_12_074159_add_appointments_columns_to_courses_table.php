<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAppointmentsColumnsToCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->integer('seats');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('from_time')->nullable();
            $table->string('to_time')->nullable();
            $table->text('week_days')->nullable();
            $table->integer('repeat')->default(0);
            $table->integer('num_of_repeat')->default(0);
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
            $table->dropColumn('seats');
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
            $table->dropColumn('from_time');
            $table->dropColumn('to_time');
            $table->dropColumn('week_days');
            $table->dropColumn('repeat');
            $table->dropColumn('num_of_repeat');
        });
    }
}

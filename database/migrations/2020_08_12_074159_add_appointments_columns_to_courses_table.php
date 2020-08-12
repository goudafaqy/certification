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
            $table->date('start_date');
            $table->date('end_date');
            $table->string('from_time');
            $table->string('to_time');
            $table->text('week_days');
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

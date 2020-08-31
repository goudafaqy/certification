<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('user_name_ar');
            $table->string('user_name_en')->nullable();
            $table->string('national_id')->nullable();
            $table->integer('user_id');
            $table->string('course_name_ar');
            $table->string('course_name_en')->nullable();
            $table->string('date');
            $table->string('hours');
            $table->string('certificate_key');
            $table->string('certificate_image')->nullable();
            $table->string('printed')->nullable();
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
        Schema::dropIfExists('certificates');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebinarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webinars', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->string("uuid");
            $table->bigInteger("zoom_id");
            $table->string("host_id");
            $table->string("topic");
            $table->integer("type");
            $table->dateTime("start_time");
            $table->integer("duration");
            $table->string("timezone");
            $table->text("agenda");
            $table->text("start_url");
            $table->text("join_url");

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
        Schema::dropIfExists('webinars');
    }
}

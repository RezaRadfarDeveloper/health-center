<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionWeekDayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_week_day', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('week_day_id');
            $table->foreign('week_day_id')->references('id')->on('week_days');
            $table->unsignedBigInteger('session_id');
            $table->foreign('session_id')->references('id')->on('sessions');
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
        Schema::dropIfExists('session_week_day');
    }
}

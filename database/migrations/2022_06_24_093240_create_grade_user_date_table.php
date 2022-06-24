<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_user_date', function (Blueprint $table) {

            $table->unsignedBigInteger('user_date_id');
            $table->foreign('user_date_id')->references('id')->on('user_dates');

            $table->unsignedBigInteger('grade_id');
            $table->foreign('grade_id')->references('id')->on('grades');

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
        Schema::dropIfExists('grade_user_date');
    }
};

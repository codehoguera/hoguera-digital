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
        Schema::create('subject_user_date', function (Blueprint $table) {

            $table->unsignedBigInteger('user_date_id');
            $table->foreign('user_date_id')->references('id')->on('user_dates');

            $table->unsignedBigInteger('subject_id');
            $table->foreign('subject_id')->references('id')->on('subjects');

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
        Schema::dropIfExists('subject_user_date');
    }
};

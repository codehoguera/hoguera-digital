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
        Schema::create('books', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_date_id');
            $table->foreign('user_date_id')->references('id')->on('user_dates');

            $table->unsignedBigInteger('grate_id');
            $table->foreign('grate_id')->references('id')->on('grades');
            
            $table->unsignedBigInteger('subject_id');
            $table->foreign('subject_id')->references('id')->on('subjects');

            $table->string('code_book', 30)->unique();
            $table->string('title', 100);
            $table->text('description');
            $table->string('book_cover', 200);
            $table->string('cover_page', 200);
            $table->string('cover_ativity', 200);
            $table->string('status', 50);
            $table->date('publication_date');

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
        Schema::dropIfExists('books');
    }
};

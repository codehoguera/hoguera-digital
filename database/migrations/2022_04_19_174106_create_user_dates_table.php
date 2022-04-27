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
        Schema::create('user_dates', function (Blueprint $table) {
            $table->id();
            
            //fk users
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            //fk regionals
            $table->unsignedBigInteger('regional_id');
            $table->foreign('regional_id')->references('id')->on('regionals');

            $table->string('name', 120);
            $table->string('first_lastname', 100);
            $table->string('second_lastname', 100);
            $table->integer('nro_ci')->nullable();
            $table->integer('issued')->nullable();
            $table->bigInteger('nit')->nullable();
            $table->date('birthday_date')->nullable();
            $table->string('city', 30)->nullable();
            $table->string('addres', 500)->nullable();
            $table->integer('landline')->nullable();
            $table->integer('cell_personal');
            $table->integer('cell_work')->nullable();
            $table->string('email_personal', 120)->unique();
            $table->string('code_sap', 20)->nullable();
            $table->string('code_employee_sap', 20)->nullable();
            $table->string('code_teacher', 30)->nullable();
            $table->tinyInteger('change_password');
            $table->integer('creator_user')->nullable();
            $table->double('rate')->nullable();
            $table->string('field1', 120)->nullable();
            $table->string('field2', 120)->nullable();
            $table->string('field3', 120)->nullable();
            $table->string('field4', 120)->nullable();
            $table->string('field5', 120)->nullable();
            $table->string('field6', 500)->nullable();
            $table->string('field7', 500)->nullable();
            $table->string('field8', 500)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_dates');
    }
};

<?php

use App\Models\Regional;
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
        Schema::create('entities', function (Blueprint $table) {
            $table->id();
            
            //fk regionals
            $table->unsignedBigInteger('regional_id');
            $table->foreign('regional_id')->references('id')->on('regionals');

            $table->string('code_sie_entity', 30);
            $table->string('name_entity', 100);
            $table->string('dependence', 200); //dependency change value
            $table->string('status', 20);
            $table->string('municipal_district', 80);
            $table->string('educational_district', 80);
            $table->string('religious_work', 80)->default("NO APLICA");
            $table->string('monthly_payment', 50); //montly change value
            $table->string('address', 500);
            $table->string('school_principal', 200);
            $table->string('x_coordinate', 50)->default("0");
            $table->string('y_coordinate', 50)->default("0");
            $table->boolean('morning_shift')->default(false);
            $table->boolean('late_shift')->default(false);
            $table->boolean('night_shift')->default(false);
            $table->tinyInteger('ini1')->default(0);
            $table->tinyInteger('ini2')->default(0);
            $table->tinyInteger('ini3')->default(0);
            $table->tinyInteger('init')->default(0);
            $table->tinyInteger('pri1')->default(0);
            $table->tinyInteger('pri2')->default(0);
            $table->tinyInteger('pri3')->default(0);
            $table->tinyInteger('pri4')->default(0);
            $table->tinyInteger('pri5')->default(0);
            $table->tinyInteger('pri6')->default(0);
            $table->tinyInteger('prit')->default(0);
            $table->tinyInteger('sec1')->default(0);
            $table->tinyInteger('sec2')->default(0);
            $table->tinyInteger('sec3')->default(0);
            $table->tinyInteger('sec4')->default(0);
            $table->tinyInteger('sec5')->default(0);
            $table->tinyInteger('sec6')->default(0);
            $table->tinyInteger('sect')->default(0);
            
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
        Schema::dropIfExists('entities');
    }
};

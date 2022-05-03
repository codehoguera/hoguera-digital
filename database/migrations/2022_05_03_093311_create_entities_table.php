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
            
            $table->bigInteger('regional_id');

            $table->string('code_entity', 30);
            $table->string('name_entity', 100);
            $table->string('type', 20);
            $table->string('city', 30);
            $table->string('province', 80);
            $table->string('distric', 80);
            $table->integer('uv');
            $table->integer('mz');
            $table->string('addres', 200);
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
        Schema::dropIfExists('entities');
    }
};

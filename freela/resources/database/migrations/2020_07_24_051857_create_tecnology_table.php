<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTecnologyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tecnology', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('user_id');
            $table->string('type');
            $table->string('tecnology');
            $table->string('nivel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tecnology');
    }
}

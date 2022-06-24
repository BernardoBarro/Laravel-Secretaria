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
        Schema::create('projeto_patrocinadores', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('projeto_id')->unsigned()->nullable();
            $table->foreign('projeto_id')->references('id')->on('projeto');
            $table->bigInteger('patrocinador_id')->unsigned()->nullable();
            $table->foreign('patrocinador_id')->references('id')->on('patrocinador');
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
        Schema::dropIfExists('projeto_patrocinadors');
    }
};

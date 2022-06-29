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
        Schema::create('projeto_instituicoes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('projeto_id')->unsigned()->nullable();
            $table->foreign('projeto_id')->references('id')->on('projeto')->onDelete('cascade');
            $table->bigInteger('instituicao_id')->unsigned()->nullable();
            $table->foreign('instituicao_id')->references('id')->on('instituicao')->onDelete('cascade');
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
        Schema::dropIfExists('projeto_instituicaos');
    }
};

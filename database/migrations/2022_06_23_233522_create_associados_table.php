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
        //Tabela dos Associados
        Schema::create('associados', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome',50);
            $table->date('dt_nascimento');
            $table->string('email', 50);
            $table->date('dt_admissao');
            $table->bigInteger('cargo_id')->unsigned()->nullable();
            $table->foreign('cargo_id')->references('id')->on('cargo');
            $table->bigInteger('endereco_id')->unsigned()->nullable();
            $table->foreign('endereco_id')->references('id')->on('endereco');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('associados');
    }
};

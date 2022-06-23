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
       //Tabela dos Convidados
       Schema::create('convidado', function (Blueprint $table) {
        $table->id();
        $table->timestamps();
        $table->string('nome',50);
        $table->string('telefone', 50);
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('convidado');
    }
};

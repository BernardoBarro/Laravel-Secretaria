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
        Schema::create('associados', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome',50);
            $table->string('genero', 15);
            $table->string('ocupacao', 50);
            $table->date('dt_nascimento');
            $table->string('email', 50);
            $table->date('dt_admissao');
            $table->string('telefone', 50);
            $table->string('padrinho', 50);
            $table->string('cargo', 50);
        });

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
        Schema::dropIfExists('associados', 'convidado');
    }
};

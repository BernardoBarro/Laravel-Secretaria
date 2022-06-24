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
       //Tabela dos Endereços
        Schema::create('endereco', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cep',8); 
            $table->string('cidade', 30);
            $table->string('bairro', 50);
            $table->string('rua', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('endereco');
    }
};

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
            $table->string('cargo', 50);
        });

        //Tabela dos Convidados
        Schema::create('convidado', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome',50);
            $table->string('telefone', 50);
        });
        
        //Tabela das Reuniões
        Schema::create('reuniao', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome',50);
            $table->string('assunto', 75);
            $table->string('local', 50);
            $table->date('dt_reuniao');
        });

        //Tabela dos Projetos
        Schema::create('projeto', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome',50); 
            $table->string('descricao', 250);
        });

        //Tabela das Instituições
        Schema::create('instituicao', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome',50); 
            $table->string('contato', 50);
        });

        //Tabela dos Patrocinadores
        Schema::create('patrocinador', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome',50); 
            $table->string('valor', 15);
            $table->string('descricao', 50);
        });

        //Tabela dos Endereços
        Schema::create('endereco', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cep',8); 
            $table->string('cidade', 30);
            $table->string('bairro', 50);
            $table->string('rua', 50);
        });
        Schema::create('cargo', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome',25); 
            $table->string('descricao',50); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('associados', 'convidado', 'projeto', 'instituicao', 'patrocinador', 'endereco','cargo');
    }
};

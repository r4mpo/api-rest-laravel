<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // Informações que irão na tabela
            $table->string('nome'); // "Aluno"

            // Chave estrangeira que relaciona com o cargo
            $table->unsignedBigInteger('cargo_id'); // chave estrangeira
            $table->foreign('cargo_id')->references('id')->on('cargos'); // relacionando

            $table->unsignedBigInteger('idade');
            $table->boolean('situacao');

            // Documento
            $table->unsignedBigInteger('cpf')->unique(); // só pode ser registrado uma vez no bd
            $table->unsignedBigInteger('rg')->unique(); // só pode ser registrado uma vez no bd

            // Endereço
            $table->unsignedBigInteger('cep');
            $table->string('logradouro');
            $table->unsignedBigInteger('numero');
            $table->string('bairro', 50);
            $table->string('cidade', 30);
            $table->string('estado', 2);
            $table->unsignedBigInteger('cod_ibge');

            // Contatos
            $table->string('email', 40)->unique(); // só pode ser registrado uma vez no bd
            $table->unsignedBigInteger('telResidencia');
            $table->unsignedBigInteger('celular');

            // Informações adicionais
            $table->unsignedBigInteger('ano_aprovacao_concurso');
            $table->unsignedBigInteger('escolaridade');
            $table->string('area_formacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
}
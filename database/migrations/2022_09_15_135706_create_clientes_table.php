<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('razao_social', 100);
            $table->string('nome_fantasia', 100)->nullable();
            $table->string('cpf_cnpj', 18);
            $table->string('email', 255);
            $table->string('telefone', 15);
            $table->date('data_nascimento', 10)->nullable();
            $table->string('cep', 10);
            $table->string('logradouro', 200);
            $table->string('complemento', 200)->nullable();
            $table->integer('numero');
            $table->string('cidade', 100);
            $table->string('uf', 2);
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
        Schema::dropIfExists('clientes');
    }
}

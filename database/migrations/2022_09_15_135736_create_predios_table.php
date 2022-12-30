<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrediosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predios', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('cep', 10);
            $table->string('logradouro', 200);
            $table->string('complemento', 200)->nullable();
            $table->integer('numero');
            $table->string('cidade', 100);
            $table->string('uf', 2);
            $table->text('url_google_maps')->nullable();
            $table->text('fotos');
            $table->text('descricao');
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
        Schema::dropIfExists('predios');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->text('descricao')->nullable(); // descricao aceitará valores nulos
            $table->integer('peso')->nullable();  // peso aceitará valores nulos
            $table->float('preco_venda',8, 2)->default(0.01); // se nenhum valor for cadastrado tera valor default de 0.01
                // 8 caracteres e 2 digitos para fração
            $table->integer('estoque_minimo')->default(1); // por default o estoque mínimo é 1
            $table->integer('estoque_maximo')->default(1); // por default o estoque máximo é 1
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
        Schema::dropIfExists('produtos');
    }
}

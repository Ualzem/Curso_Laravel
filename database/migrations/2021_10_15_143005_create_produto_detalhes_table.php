<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoDetalhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_detalhes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id'); // chave estrangeira
             //unsigned - não aceita num. negativo
            $table->float('comprimento', 8, 2); // até 8 dígitos e 2 decimais pós vírgula
            $table->float('largura', 8, 2);
            $table->float('altura', 8, 2);
            $table->timestamps();
            // CONSTRAINT DE RELACIONAMENTO:
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->unique('produto_id'); // garante a não inclusão de valores repetidos
            // garantindo o relacionamento de 1 para 1
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_detalhes');
    }
}

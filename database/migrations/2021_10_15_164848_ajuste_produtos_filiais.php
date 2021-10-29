<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        // criando a tabela filiais:
        Schema::create('filiais', function (Blueprint $table) {
            $table->id();
            $table->string('filial', 30);      
            $table->timestamps();
        });

        // criando a tabela produto_filiais: (essa tabela serve de ponte entre as tabelas produto e filiais)
        Schema::create('produto_filiais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->decimal('preco_venda', 8, 2); // por causa de nossa regra de negocio esse valor varia
            $table->integer('estoque_minimo'); // por causa de nossa regra de negocio esse valor varia
            $table->integer('estoque_maximo'); // por causa de nossa regra de negocio esse valor varia
            // por isso transferimos os 3 para aqui devemos retirar eles da tabela produtos
            $table->timestamps();

             // foreign key (constraints)
             $table->foreign('filial_id')->references('id')->on('filiais');
             $table->foreign('produto_id')->references('id')->on('produtos');
        });

       

        // removendo as 3 colunas da tabela produtos:
         Schema::table('produtos', function (Blueprint $table) {
             $table->dropColumn(['preco_venda', 'estoque_minimo', 'estoque_maximo']);

         });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // ADICIONANDO as 3 colunas da tabela produtos: (JÁ QUE NO UP REMOVEMOS ELES):
         Schema::table('produtos', function (Blueprint $table) {
             $table->decimal('preco_venda', 8, 2);
             $table->integer('estoque_minimo');
             $table->integer('estoque_maximo');
         });

         Schema::dropIfExists('produto_filiais');

         Schema::dropIfExists('filiais');
    }
}

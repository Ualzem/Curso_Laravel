<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5); // cm, m, kg, g, etc....
            $table->string('descricao', 30);
            $table->timestamps();
        });

        // ADICIONANDO O RELACIONAMENTO COM A TABELA PRODUTOS
          Schema::table('produtos', function (Blueprint $table){
              $table->unsignedBigInteger('unidade_id'); // criando unidade_id na tabela produtos (FK)
              $table->foreign('unidade_id')->references('id')->on('unidades');// chave estrangeira
          });

        // ADICIONANDO O RELACIONAMENTO COM A TABELA PRODUTO_DETALHES
          Schema::table('produto_detalhes', function (Blueprint $table){
              $table->unsignedBigInteger('unidade_id'); // criando unidade_id na tabela produtos (FK)
              $table->foreign('unidade_id')->references('id')->on('unidades');// chave estrangeira
          });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // REMOVENDO O RELACIONAMENTO COM A TABELA PRODUTO_DETALHES:
        Schema::table('produto_detalhes', function (Blueprint $table){
        // REMOVENDO A FK
        $table->dropForeign('produto_detalhes_unidade_id_foreign');
        // REMOVENDO A COLUNA unidade_id
        $table->dropColumn('unidade_id');
        });


        // REMOVENDO O RELACIONAMENTO COM A TABELA PRODUTOS:
        Schema::table('produtos', function (Blueprint $table){
        // REMOVENDO A FK
        $table->dropForeign('produtos_unidade_id_foreign');
        // REMOVENDO A COLUNA unidade_id
        $table->dropColumn('unidade_id');
        });

        // REMOVENDO A TABELA UNIDADES:
        Schema::dropIfExists('unidades');

        // A ORDEM DE REMOÇÃO É CONTRÁRIA À DE ADIÇÃO
        }
}

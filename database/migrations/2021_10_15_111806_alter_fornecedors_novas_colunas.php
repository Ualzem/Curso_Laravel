<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFornecedorsNovasColunas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // ::table porque vai acrescentar itens na tabela:
         Schema::table('fornecedors', function (Blueprint $table) {
            $table->string('uf', 2);
            $table->string('email', 150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('fornecedors', function (Blueprint $table) {
           // REMOVENDO SÓ 1 COLUNA:
           // $table->dropColumn('uf');

           // REMOVENDO MAIS DE 1 COLUNA DE 1 VEZ:
           $table->dropColumn(['uf', 'email']);
        });
    }
}

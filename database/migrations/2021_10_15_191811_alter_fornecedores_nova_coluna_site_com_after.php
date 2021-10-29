<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFornecedoresNovaColunaSiteComAfter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::table('fornecedors', function (Blueprint $table){
            $table->string('site', 150)->after('nome')->nullable(); 
            // site vai ser criada after nome (à direita) e aceita valor nulo(nem todos tem site)
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fornecedors', function (Blueprint $table){
            $table->dropColumn('site'); 
     });
    }
}

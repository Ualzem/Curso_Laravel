<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // FORMA DE CRIAR 1 (instanciando 1 objeto)
       $fornecedor = new Fornecedor(); // objeto fornecedor do banco
       $fornecedor->nome = 'Fornece Tudo Ltda';
       $fornecedor->site = 'fornecet.com.br';
       $fornecedor->uf = 'PB';
       $fornecedor->email = 'contato@fornecet.com.br';
       $fornecedor->save(); // salva no banco de dados

       // FORMA DE CRIAR 2(método create, observar o fillable de Fornecedor.php)
       Fornecedor::create([
           'nome'  => 'Fornecedor Guraya',
           'site'  => 'guraya.com.br',
           'uf'    => 'MG',
           'email' => 'contatenos@guraya.com.br'
       ]);

        // FORMA DE CRIAR 3(insert do banco de dados)
        DB::table('fornecedors')->insert([
            'nome'  => 'Fornecedor Sucupyra',
            'site'  => 'supyra.com.br',
            'uf'    => 'MT',
            'email' => 'contato@supyra.com.br'
        ]);
    }
}

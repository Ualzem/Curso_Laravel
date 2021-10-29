<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $contato = new SiteContato();
        $contato->nome = 'Sistema SRX';
        $contato->telefone = '(37) 4355-0978';
        $contato->email = 'contato@srx.com.br';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Welcome to the Jungle!';
        $contato->save();    */

        // como não temos o fillable em SiteContato.php NÃO PODEMOS USAR O MÉTODO CREATE AQUI

        // INCORPORANDO FACTORY:
        factory(SiteContato::class, 100)->create(); // 100 vai criar 100 registros
    }
}

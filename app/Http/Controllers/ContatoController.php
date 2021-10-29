<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller
{
     public function contato(Request $request){

      //dd($request);


     /* echo '<pre>';
        print_r($request->all());
       echo '</pre>';  */

      /*
      // MODO 1:
       $contato = new SiteContato();
       $contato->nome = $request->input('nome');
       $contato->telefone = $request->input('telefone');
       $contato->email = $request->input('email');
       $contato->motivo_contato = $request->input('motivo_contato');
       $contato->mensagem = $request->input('mensagem');
       //print_r($contato->getAttributes());
       $contato->save();   
       */


/*
       // MODO 2 (RESUMIDO, APÓS ADICIONAR O FILLABLE LÁ NO MODEL SITECONTATO.PHP):
       $contato = new SiteContato();
       $contato->fill($request->all());
       $contato->save();
*/
        $motivo_contatos = [  // variável para uso do método old la no form_contato.blade.php 
          '1' => 'Dúvida',
          '2' => 'Elogio',
          '3' => 'Reclamação',
        ];

         return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
       //site - pasta    CONTATO - a view
    }

    public function salvar(Request $request) {
     // VALIDAÇÃO DOS CAMPOS DO FORMULÁRIO QUE ESTÁ EM:(D:\00_CURSO_LARAVEL_2021_UDEMY\Projetos\super_gestao\resources\views\site\layouts\_components\form_contato.blade.php)
     $request->validate([
       'nome'           => 'required|min:3|max:45',  // ESSE NOME É O NAME DO INPUT LÁ DO form_contato.blade.php
       'telefone'       => 'required',  // minimo 3 caracteres e máximo 45 caracteres.
       'email'          => 'required',
       'motivo_contato' => 'required',
       'mensagem'       => 'required|max:1000'  // mensagem pode ter no máximo 1000 caracteres
     ]);
    }
}

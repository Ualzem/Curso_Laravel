<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal(){

        $motivo_contatos = [  // variável para uso do método old la no form_contato.blade.php 
          '1' => 'Dúvida',
          '2' => 'Elogio',
          '3' => 'Reclamação',
        ];
        
       return view('site.principal', ['motivo_contatos' => $motivo_contatos]);
       //site - pasta    principal - a view
    }
}

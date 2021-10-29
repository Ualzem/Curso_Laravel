<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
   public function index(){
$fornecedores = [
    'Fornecedor 1',
    'Fornecedor 1',
    'Fornecedor 1',
    'Fornecedor 1',
    'Fornecedor 1',
    'Fornecedor 1',
    'Fornecedor 1',
    'Fornecedor 1',
    'Fornecedor 1',
    'Fornecedor 1',
    'Fornecedor 1'

]; // variavel para usar if else no blade

$fornecedores2 = [
    0 =>[
        'nome'     => 'Fornecedor 222',
        'status'   => 'N',
        'cnpj'     => '12.234.456.678/0001-89',
        'ddd'      => '37', //pitangui - MG
        'telefone' => '98807-5654'
    ],
    1 => [
       'nome'     => 'Fornecedor 333',
       'status'   => 'S',
       'cnpj'     => null,
       'ddd'      => '85', // fortaleza - CE
       'telefone' => '99907-1234'
    ],
    2 => [
       'nome'     => 'Fornecedor 444',
       'status'   => 'S',
       'cnpj'     => null,
       'ddd'      => '11',  // são paulo - SP
       'telefone' => '98457-5794'
    ],
];

          // OPERADOR TERNÁRIO:
          echo isset($fornecedores2[1]['cnpj']) ? 'CNPJ Informado!' : 'CNPJ Não Informado';
          // se tiver cnpj retorna cnpj informado, senão, retorna cnpj não informado

       return view('app.fornecedor.index', compact('fornecedores','fornecedores2')); 
       // pasta app/pasta fornecedor/index.blade.php
   }
}

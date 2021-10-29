<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'PrincipalController@principal')->name('site.index');
//@principal é a action =  public function principal()

Route::get('/sobrenos', 'SobreNosController@sobrenos')->name('site.sobrenos');
//@sobrenos é a action =  public function sobrenos()

Route::get('/contato', 'ContatoController@contato')->name('site.contato');
//@contato é a action =  public function contato()

Route::post('/contato', 'ContatoController@salvar')->name('site.contato');
// envio da rota com o verbo http post

Route::get('/login', function(){return 'Login';})->name('site.login');


// ROTAS AGRUPADAS:
Route::prefix('/app')->group(function(){ // Esse app nós é que escolhemos, pode ser qualquer nome
    Route::get('/clientes', function(){return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');
    Route::get('/produtos', function(){return 'Produtos';})->name('app.produtos');
});

// ROTAS PARA EXEMPLO DE DIRECIONAMENTO DE ROTAS:
Route::get('/rota1', function(){
      echo 'Rota 1';
})->name('site.rota1');

Route::get('/rota2', function(){
     return redirect()->route('site.rota1'); // redirect redireciona para o rota1
})->name('site.rota2'); // dessa forma quando acessar a rota 2 seremos redirecionados para a rota 1


// ROTA DE FALLBACK (QUANDO A ROTA BUSCADA NÃO EXISTE)
Route::fallback(function() {
  echo 'A página acessada não existe! <a href="'.route('site.index').'">
  Clique Aqui</a> para ir para a página inicial.';
});


// ROTA PARA PASSAR PARAMETROS PARA O CONTROLADOR:
Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste'); //parametro p1 e p2 obrigatorios




//**************************************************************************** */
//**************************************************************************** */
//**************************************************************************** */

// ROTAS COM PARÂMETROS:
Route::get('/contato/{nome}', function(string $nome){
  echo 'Estou Aqui: '.$nome;
  //parametros dentro de chaves
});

Route::get('/sobrenos/{nome}/{cargo?}', function(string $nome, string $cargo = 'Não tem cargo'){
  echo "Estou Aqui: $nome - Cargo: $cargo";
  //parametros dentro de chaves
});

// ROTAS COM PARÂMETRO E EXPRESSÕES REGULARES:
Route::get('/contato/{empresa}/{categoria_id}',
function(
string $empresa = 'Desconhecido',
int $categoria_id = 1
){
  echo "Nossa Empresa $empresa - $categoria_id";
}
)->where('categoria_id', '[0-9]+') //expressão regular
// categoria_id [0-9] tem que ser numero de zero a 9   + pelo menos 1 número
->where('empresa', '[A-Za-z]+'); // expressão regular
// empresa tem qque ser string [A-Zaz] strings entre A maiusculo e Z maiusculo e a e z minusculo
//e pelo menos 1 caracter







//Route::get('/', function () {
  //  return '<h1> Seja bem-vindo</h1>';
//});

//Route::get('/sobrenos', function () {
//    return '<h1> PÁGINA SOBRE NÓS</h1>';
//});
//Route::get('/contato', function () {
 //   return '<h1>PÁGINA DE CONTATO</h1>';
//});


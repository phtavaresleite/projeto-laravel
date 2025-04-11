<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return "Olá, seja bem vindo";
// });

// Route::get('/sobrenos', function () {
    //     return "Sobre nós";
    // });
    
    // Route::get('/contato', function () {
        //     return "Contato";
        // });

/* verbos http

get
post
put
delete
patch
options

*/
        
//definindo rotas com controller      
Route::get('/', [App\Http\Controllers\PrincipalController::class, 'principal']);
Route::get('/sobrenos', [App\Http\Controllers\SobreNosController::class, 'sobreNos']);
Route::get('/contato', [App\Http\Controllers\ContatoController::class, 'contato']);
Route::get('/login', function(){ return "Login"; });

//agrupando rotas
Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){ return "Clientes"; });
    Route::get('/fornecedores', function(){ return "Fornecedores"; });
    Route::get('/produtos', function(){ return "Produtos"; });
});

Route::get('/contato/{nome}/{categoria_id}', function (string $nome, int $categoria = 1 //1 = "informação"
){
    return "Estamos aqui $nome - $categoria";
}) -> where([
    'categoria' => '[0-9]+',
])-> where([
    'nome' => '[A-Za-z]+',
]);
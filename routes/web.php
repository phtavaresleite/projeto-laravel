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
Route::get('/', [App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobrenos', [App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/contato', [App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::get('/login', function(){ return "Login"; })->name('site.login');

//agrupando rotas
Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){ return "Clientes"; })->name('app.clientes');
    Route::get('/fornecedores', [App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::get('/produtos', function(){ return "Produtos"; })->name('app.produtos');
});

Route::get ('/teste/{p1}/{p2}',[App\Http\Controllers\TesteController::class, 'teste'])->name('site.teste');

Route::fallback(function(){
    echo "Rota nao encontrada. Clique <a href='".route('site.index')."'>aqui</a> para ir para a principal";
});


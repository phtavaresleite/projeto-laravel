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
Route::post('/contato', [App\Http\Controllers\ContatoController::class, 'salvar'])->name('site.contato');
Route::get('/login/{erro?}', [App\Http\Controllers\LoginController::class, 'index'])->name('site.login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'autenticar'])->name('site.login');

//agrupando rotas
Route::middleware('autenticacao:padrao')->prefix('/app')->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [App\Http\Controllers\LoginController::class, 'sair'])->name('app.sair');
    Route::get('/cliente', [App\Http\Controllers\ClienteController::class, 'index'])->name('app.cliente');
    Route::get('/fornecedor', [App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::post('/fornecedor/listar', [App\Http\Controllers\FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::match(['get', 'post'],'/fornecedor/adicionar', [App\Http\Controllers\FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');


    Route::get('/produto', [App\Http\Controllers\ProdutoController::class, 'index'])->name('app.produto');
});

Route::get ('/teste/{p1}/{p2}',[App\Http\Controllers\TesteController::class, 'teste'])->name('site.teste');

Route::fallback(function(){
    echo "Rota nao encontrada. Clique <a href=\"#\" onclick=\"window.history.back(); return false;\">aqui</a> para voltar para a página anterior.";
});


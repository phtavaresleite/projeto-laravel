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
        
        
Route::get('/', [App\Http\Controllers\PrincipalController::class, 'principal']);

Route::get('/sobrenos', [App\Http\Controllers\SobreNosController::class, 'sobreNos']);

Route::get('/contato', [App\Http\Controllers\ContatoController::class, 'contato']);

Route::get('/contato/{nome}/{categoria}/{assunto}/{mensagem?}', function (string $nome, string $categoria, string $assunto, string $mensagem = "Sem mensagem") {
    return "Estamos aqui " . $nome ."-". $categoria. "-".  $assunto ."-". $mensagem;
});
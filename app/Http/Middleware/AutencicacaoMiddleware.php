<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutencicacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao): Response
    {

        echo "Passando pelo middleware de autenticação: $metodo_autenticacao <br>";
        if(true){
            return $next($request);
        }
        else{ 
            return Response('Acesso negado!');
        }

    }
}

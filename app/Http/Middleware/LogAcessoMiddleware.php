<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\LogAcesso; 

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //dd($request);
        $ip = $request->server->get('REMOTE_ADDR'); // Get the client's IP address
        $rota = $request->getRequestUri(); // Get the requested URI
        LogAcesso::create(['log' => "IP: $ip - Rota: $rota"]); // Log the access
        //return Response('Acesso registrado com sucesso!', 200); // Return a response indicating success
        $resposta = $next($request);
        $resposta->setStatusCode(201, 'Acesso registrado com sucesso!');

        return $resposta;
    }
}

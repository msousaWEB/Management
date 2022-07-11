<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $auth_method, $profile)
    {
        if($auth_method == 'default'){

        }
        //Verifica se o usuário possui permissão
        if(true){
            return $next($request);
        } else {
            return Response('Acesso negado!');
        }
    }
}

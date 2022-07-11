<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAccess;

class LogAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $ip = $request->server->get('REMOTE_ADDR');
        $route = $request->getRequestUri();

        LogAccess::create(['log' => "This IP: ($ip), requested route: $route"]);
        // return $next($request);
        $response = $next($request);
        $response->setStatusCode(201,'Teste');

        return $response;
    }
}

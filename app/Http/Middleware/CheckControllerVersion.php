<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckControllerVersion
{
    private const HTTP_NOT_FOUND = 404;
    
    public function handle(Request $request, Closure $next): Response
    {
        $controller = $request->route()->getController();
        
        $version = $request->route('version') ?: 'v1';
        
        if (!method_exists($controller, $version)) {
            abort(self::HTTP_NOT_FOUND);
        }
        
        return $next($request);
    }
}

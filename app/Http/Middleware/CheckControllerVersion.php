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
        $method = $request->route()->getActionMethod();
        $currentApiVersion = strtoupper($request->segment(2));
        $controller = $request->route()->getControllerClass();
        
        if (method_exists($controller, $method)) {
            return $next($request);
        }
        
        $numberApiVersion = (int)substr($currentApiVersion, 1);
        if ($numberApiVersion > 1) {
            $pastApiVersion = 'V' . ($numberApiVersion - 1);
            $pastApiController = str_replace($currentApiVersion, $pastApiVersion, $controller);
            
            if (method_exists($pastApiController, $method)) {
                $pastVersionApiUrl = str_replace(strtolower($currentApiVersion), strtolower($pastApiVersion), $request->url());
                return \redirect($pastVersionApiUrl);
            }
        }
        
        abort(self::HTTP_NOT_FOUND);
    }
    
}

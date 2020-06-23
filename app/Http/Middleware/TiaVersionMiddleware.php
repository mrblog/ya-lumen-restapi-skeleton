<?php

namespace App\Http\Middleware;

use Closure;

class TiaVersionMiddleware
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
        $version = $request->header('X-TIAVers');
        if (empty($version)) {
            // default value for version
            $version = '4.01';
        }
        $request->request->add(["version" => $version]);
        return $next($request);
    }
}

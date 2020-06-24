<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;

class Authenticate
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //if ($this->auth->guard($guard)->guest()) {
        $token = $request->header('X-Token');
        $apiKey = $request->header('X-Api-Key');
        //error_log("Authenticate token: ".$token);
        if (!empty($token) && !empty($apiKey)) {
            // validate key and token here
            $request->request->add(['token' => $token]);
            //error_log("Authenticate request: " . var_export($request->all(), TRUE));
        }
        //if (!array_key_exists('token', $request->all())) {
        if (!$request->has('token')) {
            return response()->json(['success' => FALSE, 'error' => 'Unauthorized.'], 401)->header('Content-Type', "application/json");
        }

        return $next($request);
    }
}

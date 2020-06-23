<?php

namespace App\Providers;

use App\Session;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('v1', function ($request) {
            $token = $request->header('X-Token');
            $apiKey = $request->header('X-Api-Key');
            error_log("AuthServiceProvider token: ".$token);
            if (!empty($token) && !empty($apiKey)) {
                // validate key and token here
                $request->request->add(['token', $token]);
                error_log("AuthServiceProvider request: ".var_export($request->request, TRUE));
                return new Session();
            }

            /*if ($request->input('api_token')) {
                return User::where('api_token', $request->input('api_token'))->first();
            }*/
        });
    }
}

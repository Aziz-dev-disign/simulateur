<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('dashboard', function($user){
            return $user->hasAnyRole(['admin','agent'])
                ? Response::allow()
                : Response::deny('vous n\'êtes pas autorisé à accédé au dashbord.');
        });
        Gate::define('user_management', function($user){
            return $user->IsAdmin()
            ? Response::allow()
            : Response::deny('vous n\'êtes pas autorisé effectuer cette tache.');
        });
        Gate::define('delete-simulateur', function($user){
            return $user->IsAdmin()            
            ? Response::allow()
            : Response::deny('vous n\'êtes pas autorisé effectuer cette tache.');
        });        
    }
}

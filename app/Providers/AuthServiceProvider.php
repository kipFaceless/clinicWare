<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);


        $gate::define('isAdmin', function($user){
            return $user->type == 'admin';
        }); 
        $gate::define('isAdminRecep', function($user){
            return $user->type == 'admin' || $user->type =='receptionist';
        });

        $gate::define('isUser', function($user){
            return $user->type =='user';
        });

        $gate::define('isReceptionist', function($user){
            return $user->type == 'receptionist';
        });

        $gate::define('isPhysician', function($user){
            return $user->type == 'physician';
        }); 

        $gate::define('isSupAdmin', function($user){
            return $user->type == 'supAdmin';
        });
        $gate::define('isGuest', function($user){
            return $user->type == 'guest';
        });

        //
    }
}

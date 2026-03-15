<?php

namespace App\Providers;

use App\Models\User;
use Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('ver-carrito',function(User $user){
            return $user->name === ['admin','user'];
        });

        Gate::define('crear-carrito',function(User $user){
            return $user->name === ['admin','user'];
        });

        Gate::define('edit-carrito',function(User $user){
            return $user->name === ['admin','user'];
        });

        Gate::define('borrar-carrito',function(User $user){
            return $user->name === ['admin','user'];
        });
    }
}

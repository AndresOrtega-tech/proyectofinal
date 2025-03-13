<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate; // No es necesario por ahora, puedes descomentarlo si usas Gate

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy', // Puedes registrar políticas aquí más adelante
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Implicitly grant "super-admin" role all permissions
        // This works in the app by using gate-related functions like auth()->user()->can() and policy()
        // Gate::before(function ($user, $ability) {
        //     return $user->hasRole('super-admin') ? true : null;
        // }); // Puedes descomentarlo y modificarlo si usas roles y permisos
    }
}

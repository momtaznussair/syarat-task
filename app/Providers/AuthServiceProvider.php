<?php

namespace App\Providers;
use Illuminate\Validation\Rules\Password;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Password::defaults(function () {
            $rule = Password::min(8)
            ->mixedCase() // Require both uppercase and lowercase characters.
            ->numbers() // Require at least one numeric character.
            ->symbols() // Require at least one special symbol.
            ->uncompromised(); // Check if the password has been compromised in data breaches.
    
        return $this->app->isProduction()
            ? $rule
            : $rule->min(8);
        });
    }
}

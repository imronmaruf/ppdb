<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        $this->registerPolicies();
        // Gate untuk role admin
        Gate::define('admin-only', function (User $user) {
            return $user->role === 'admin';
        });
        // Gate untuk role siswa
        Gate::define('siswa-only', function (User $user) {
            return $user->role === 'siswa';
        });
    }
}

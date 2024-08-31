<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposer\PesertaPpdbComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Daftarkan service provider lain, library, atau komponen yang dibutuhkan di sini.
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Daftarkan PesertaPpdbComposer untuk semua view
        View::composer('*', PesertaPpdbComposer::class);
    }
}

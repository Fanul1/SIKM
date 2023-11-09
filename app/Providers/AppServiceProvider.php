<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Ukm;

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
        view()->composer(['user.editor.layouts.main'], function ($view) {
            // Retrieve the $ukm variable and pass it to the view
            $user = auth()->user();
            $ukm = $user ? $user->ukm : null;
    
            $view->with('ukm', $ukm);
        });
    }
}

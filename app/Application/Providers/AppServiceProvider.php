<?php

namespace App\Application\Providers;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Component;

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
        Paginator::useTailwind();
        Schema::defaultStringLength(191);
        Factory::guessFactoryNamesUsing(function(string $modelName) {
            return 'Database\\Factories\\' . class_basename($modelName) . 'Factory';
        });
        
    }
}

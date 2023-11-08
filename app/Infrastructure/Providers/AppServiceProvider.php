<?php

namespace App\Infrastructure\Providers;

use App\Infrastructure\Commands\ModelMakeCommand;
use Illuminate\Foundation\Console\ModelMakeCommand as BaseModelMakeCommand;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        if ($this->app->runningInConsole()) {
//            $this->commands([
//                InstallCommand::class,
//                NetworkCommand::class,
//            ]);
//        }
    }
}

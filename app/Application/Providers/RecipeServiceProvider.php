<?php

namespace App\Application\Providers;

use App\Domain\Recipe\Application\UseCases\CreateRecipeUseCase;
use App\Domain\Recipe\Domain\Repositories\RecipeRepositoryInterface;
use App\Domain\Recipe\Domain\Services\Recipe\RecipeService;
use App\Infrastructure\Eloquent\Recipe\RecipeEloquentRepository;
use Illuminate\Support\ServiceProvider;

class RecipeServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Registrar la interfaz del repositorio y su implementación
        $this->app->bind(RecipeRepositoryInterface::class, RecipeEloquentRepository::class);

        // Registrar el servicio de dominio
        $this->app->singleton(RecipeService::class, function ($app) {
            return new RecipeService($app->make(RecipeRepositoryInterface::class));
        });

        // Registrar el caso de uso
        $this->app->singleton(CreateRecipeUseCase::class, function ($app) {
            return new CreateRecipeUseCase($app->make(RecipeService::class));
        });
    }

    public function boot()
    {
        // Puedes agregar configuraciones adicionales o enlaces aquí
    }
}

<?php

namespace App\Infrastructure\Console\Commands;

use Illuminate\Console\Command;

class GenerateRecipeReportCommand extends Command
{
    protected $signature = 'recipe:generate-report';

    protected $description = 'Generate a report of recipes';

    public function handle()
    {
        // Lógica para generar el informe de recetas
        $this->info('Recipe report generated successfully!');
    }
}

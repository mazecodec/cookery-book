<?php

namespace App\Infrastructure\Commands;

use Illuminate\Foundation\Console\ModelMakeCommand as BaseMakeCommand;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'make:model')]
class ModelMakeCommand extends BaseMakeCommand
{
        /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return is_dir(app_path('/Infrastructure/Models')) ? $rootNamespace.'\\Infrastructure\\Models' : $rootNamespace;
    }
}

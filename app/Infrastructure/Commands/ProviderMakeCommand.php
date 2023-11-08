<?php

namespace App\Infrastructure\Commands;

use Illuminate\Foundation\Console\ProviderMakeCommand as BaseMakeCommand;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'make:provider')]
class ProviderMakeCommand extends BaseMakeCommand
{
        /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Infrastructure\Providers';
    }
}

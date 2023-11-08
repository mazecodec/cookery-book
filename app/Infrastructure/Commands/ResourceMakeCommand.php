<?php

namespace App\Infrastructure\Commands;

use Illuminate\Foundation\Console\ResourceMakeCommand as BaseMakeCommand;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'make:resource')]
class ResourceMakeCommand extends BaseMakeCommand
{
    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Infrastructure\Http\Requests';
    }
}

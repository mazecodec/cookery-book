<?php

namespace App\Infrastructure\Commands;

use Illuminate\Routing\Console\ControllerMakeCommand as BaseMakeCommand;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'make:controller')]
class ControllerMakeCommand extends BaseMakeCommand
{
        /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Presentation\Http\Controllers';
    }
}

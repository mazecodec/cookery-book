<?php

namespace App\Infrastructure\Commands;

use Illuminate\Routing\Console\MiddlewareMakeCommand as BaseMakeCommand;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'make:middleware')]
class MiddlewareMakeCommand extends BaseMakeCommand
{
        /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Infrastructure\Http\Middleware';
    }
}

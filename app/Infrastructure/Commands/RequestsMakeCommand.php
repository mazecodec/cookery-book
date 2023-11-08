<?php

namespace App\Infrastructure\Commands;

use Illuminate\Foundation\Console\RequestMakeCommand as BaseMakeCommand;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'make:request')]
class RequestsMakeCommand extends BaseMakeCommand
{
        /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Infrastructure\Http\Requests';
    }
}

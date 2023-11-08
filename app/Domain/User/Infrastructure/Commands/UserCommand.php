<?php

namespace App\Domain\User\Infrastructure\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'maze:user')]
class UserCommand extends Command
{
    public function handle() {
        $this->info("user command");
    }
}

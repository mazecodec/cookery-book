<?php

namespace App\Domain\Product\Infrastructure\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'maze:product')]
class ProductCommand extends Command
{
    public function handle() {
        $this->info('product command');
    }
}

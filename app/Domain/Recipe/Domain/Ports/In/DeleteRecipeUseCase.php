<?php

namespace App\Domain\Recipe\Domain\Ports\In;

interface DeleteRecipeUseCase
{
    public function delete(int $id): void;
}

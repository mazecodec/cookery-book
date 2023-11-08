<?php

namespace App\Application\Services;

use App\Domain\Recipe\Domain\Ports\In\CreateNewRecipeUseCase;
use App\Domain\Recipe\Domain\Ports\In\DeleteRecipeUseCase;
use App\Domain\Recipe\Domain\Ports\In\RetrieveRecipeUseCase;
use App\Domain\Recipe\Domain\Ports\In\UpdateRecipeUseCase;

interface RecipeServiceInterface extends CreateNewRecipeUseCase, RetrieveRecipeUseCase, DeleteRecipeUseCase, UpdateRecipeUseCase
{

}

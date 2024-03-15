<?php

namespace Dmontielfdez\Core\Food\Domain\Repositories;

use Dmontielfdez\Core\Food\Domain\Entities\Food;
use Dmontielfdez\Core\Food\Domain\ReadModels\ListFoodRM;
use Dmontielfdez\Core\Food\Domain\ValueObjects\FoodId;

interface FoodRepositoryInterface
{
    public function store(Food $food): void;

    public function findByIdOrFail(FoodId $foodId): Food;

    /**
     * @return array<ListFoodRM>
     */
    public function findAll(): array;
}

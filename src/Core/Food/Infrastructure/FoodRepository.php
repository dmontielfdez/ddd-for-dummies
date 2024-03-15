<?php

namespace Dmontielfdez\Core\Food\Infrastructure;

use Dmontielfdez\Core\Food\Domain\Entities\Food;
use Dmontielfdez\Core\Food\Domain\Repositories\FoodRepositoryInterface;
use Dmontielfdez\Core\Food\Domain\ValueObjects\FoodId;

final class FoodRepository implements FoodRepositoryInterface
{

    public function store(Food $food): void
    {

    }

    public function findByIdOrFail(FoodId $foodId): Food
    {

    }

    public function findAll(): array
    {
        return [];
    }
}

<?php

namespace Dmontielfdez\Core\Food\Infrastructure;

use Dmontielfdez\Core\Food\Domain\Entities\Food;
use Dmontielfdez\Core\Food\Domain\Repositories\FoodRepositoryInterface;

final class FoodRepository implements FoodRepositoryInterface
{

    public function store(Food $food): void
    {

    }

    public function findByIdOrFail(): Food
    {

    }
}

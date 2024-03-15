<?php

namespace Dmontielfdez\Core\Food\Domain\Repositories;

use Dmontielfdez\Core\Food\Domain\Entities\Food;

interface FoodRepositoryInterface
{
    public function store(Food $food): void;
}

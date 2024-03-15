<?php

namespace Dmontielfdez\Core\Food\Domain\ReadModels;

final class ListFoodRM
{
    public function __construct(
        public string $id,
        public string $status,
        public string $name,
        public ?int $proteins,
        public ?int $fats,
        public ?int $carbs,
        public string $type,
        public int $amount
    )
    {
    }
}

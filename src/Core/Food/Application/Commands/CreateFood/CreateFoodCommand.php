<?php

namespace Dmontielfdez\Core\Food\Application\Commands\CreateFood;

use Dmontielfdez\Core\Food\Domain\Enums\FoodPortionType;
use Dmontielfdez\Core\Food\Domain\ValueObjects\FoodId;
use Dmontielfdez\Shared\Framework\Application\Commands\CommandInterface;

/**
 * @see CreateFoodHandler
 */
final class CreateFoodCommand implements CommandInterface
{
    public function __construct(
        public FoodId $id,
        public string $name,
        public ?int $proteins,
        public ?int $fats,
        public ?int $carbs,
        public FoodPortionType $type,
        public int $amount
    )
    {
    }
}

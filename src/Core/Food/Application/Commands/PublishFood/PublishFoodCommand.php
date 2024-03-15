<?php

namespace Dmontielfdez\Core\Food\Application\Commands\PublishFood;

use Dmontielfdez\Core\Food\Domain\Enums\FoodPortionType;
use Dmontielfdez\Core\Food\Domain\ValueObjects\FoodId;
use Dmontielfdez\Shared\Framework\Application\Commands\CommandInterface;

/**
 * @see PublishFoodHandler
 */
final class PublishFoodCommand implements CommandInterface
{
    public function __construct(public FoodId $id)
    {
    }
}

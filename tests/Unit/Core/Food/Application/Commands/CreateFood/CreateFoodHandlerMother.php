<?php

namespace Tests\Unit\Core\Food\Application\Commands\CreateFood;

use Dmontielfdez\Core\Food\Application\Commands\CreateFood\CreateFoodCommand;
use Dmontielfdez\Core\Food\Domain\Enums\FoodPortionType;
use Dmontielfdez\Core\Food\Domain\ValueObjects\FoodId;
use Tests\Unit\FakerMother;

final class CreateFoodHandlerMother
{
    public static function random(): CreateFoodCommand
    {
        $foodId = FoodId::random();
        $name = FakerMother::name();
        $proteins = FakerMother::quantity();
        $fats = FakerMother::quantity();
        $carbs = FakerMother::quantity();
        $portionType = FakerMother::randomItem(FoodPortionType::class);
        $amount = FakerMother::quantity();

        return new CreateFoodCommand(
            $foodId,
            $name,
            $proteins,
            $fats,
            $carbs,
            $portionType,
            $amount
        );
    }
}

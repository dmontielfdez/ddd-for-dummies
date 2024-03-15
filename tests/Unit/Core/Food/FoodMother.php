<?php

namespace Tests\Unit\Core\Food;

use Dmontielfdez\Core\Food\Domain\Entities\Food;
use Dmontielfdez\Core\Food\Domain\Enums\FoodPortionType;
use Dmontielfdez\Core\Food\Domain\ValueObjects\FoodId;
use Tests\Unit\FakerMother;

final class FoodMother
{
    public static function create(
        FoodId $foodId,
        string $name,
        int $proteins,
        int $fats,
        int $carbs,
        FoodPortionType $portionType,
        int $amount
    ): Food
    {
        return Food::create($foodId, $name, $proteins, $fats, $carbs, $portionType, $amount);
    }

    public static function random(): Food
    {
        $foodId = FoodId::random();
        $name = FakerMother::name();
        $proteins = FakerMother::quantity();
        $fats = FakerMother::quantity();
        $carbs = FakerMother::quantity();
        $portionType = FakerMother::randomItem(FoodPortionType::class);
        $amount = FakerMother::quantity();

        return Food::create($foodId, $name, $proteins, $fats, $carbs, $portionType, $amount);
    }
}

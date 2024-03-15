<?php

namespace Dmontielfdez\Core\Food\Infrastructure\Repositories;

use Dmontielfdez\Core\Food\Domain\Entities\Food;
use Dmontielfdez\Core\Food\Domain\Enums\FoodPortionType;
use Dmontielfdez\Core\Food\Domain\Enums\FoodStatus;
use Dmontielfdez\Core\Food\Domain\ValueObjects\FoodId;
use Dmontielfdez\Core\Food\Domain\ValueObjects\FoodPortion;

final readonly class FoodMapper
{

    /**
     * @param Food $food
     * @return array<string,mixed>
     */
    public static function extract(Food $food): array
    {
        return [
            'id' => $food->id->getValue(),
            'status' => $food->status->value,
            'name' => $food->name,
            'proteins' => $food->proteins,
            'fats' => $food->fats,
            'carbs' => $food->carbs,
        ];
    }

    /**
     * @param FoodAR $foodAR
     * @param FoodPortionAR $foodPortionAR
     * @return Food
     */
    public static function hydrate(FoodAR $foodAR, FoodPortionAR $foodPortionAR): Food
    {
        return new Food(
            FoodId::create($foodAR->id),
            FoodStatus::from($foodAR->status),
            $foodAR->name,
            $foodAR->proteins,
            $foodAR->fats,
            $foodAR->carbs,
            FoodPortion::createFrom(FoodPortionType::from($foodPortionAR->type), $foodPortionAR->amount ?? 0)
        );
    }
}

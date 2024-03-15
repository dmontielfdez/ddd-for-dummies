<?php

namespace Dmontielfdez\Core\Food\Infrastructure\Repositories;

use Dmontielfdez\Core\Food\Domain\Entities\Food;
use Dmontielfdez\Core\Food\Domain\Enums\FoodPortionType;
use Dmontielfdez\Core\Food\Domain\ReadModels\ListFoodRM;
use Dmontielfdez\Core\Food\Domain\Repositories\FoodRepositoryInterface;
use Dmontielfdez\Core\Food\Domain\ValueObjects\FoodId;
use function array_map;

final class FoodRepository implements FoodRepositoryInterface
{

    public function store(Food $food): void
    {
        /** @var FoodAR|null $foodAR */
        $foodAR = FoodAR::query()->where('id', $food->id->getValue())->first();
        if ($foodAR) {
            $foodAR->update(FoodMapper::extract($food));
        } else {
            FoodAR::create(FoodMapper::extract($food));
        }

        FoodPortionAR::query()->updateOrCreate(
            ['foodId' => $food->id->getValue()],
            ['type' => $food->foodPortion->type->value, 'amount' => $food->foodPortion->amount]

        );
    }

    public function findByIdOrFail(FoodId $foodId): Food
    {
        /** @var FoodAR $foodAR */
        $foodAR = FoodAR::query()->findOrFail($foodId->getValue());
        /** @var FoodPortionAR $foodPortionAR */
        $foodPortionAR = FoodPortionAR::query()->where('foodId', $foodId->getValue())->firstOrFail();

        return FoodMapper::hydrate($foodAR, $foodPortionAR);
    }

    public function findAll(): array
    {
        /** @var FoodAR[] $foodsAR */
        $foodsAR = FoodAR::query()->get()->all();
        return array_map(
            static function (FoodAR $foodAR) {
                /** @var FoodPortionAR $foodPortionAR */
                $foodPortionAR = FoodPortionAR::query()->where('foodId', $foodAR->id)->firstOrFail();
                return new ListFoodRM(
                    $foodAR->id,
                    $foodAR->status,
                    $foodAR->name,
                    $foodAR->proteins,
                    $foodAR->fats,
                    $foodAR->carbs,
                    FoodPortionType::from($foodPortionAR->type)->name,
                    $foodPortionAR->amount ?? 0
                );
            },
            $foodsAR
        );
    }
}

<?php

namespace Tests\Unit\Core\Food\Domain\Entities;

use Dmontielfdez\Core\Food\Domain\Entities\Food;
use Dmontielfdez\Core\Food\Domain\Enums\FoodPortionType;
use Dmontielfdez\Core\Food\Domain\Events\FoodCreated;
use Dmontielfdez\Core\Food\Domain\Events\FoodPublished;
use Dmontielfdez\Core\Food\Domain\Exceptions\FoodDataNotValidException;
use Dmontielfdez\Core\Food\Domain\ValueObjects\FoodId;
use Tests\Unit\Core\Food\FoodMother;
use Tests\Unit\FakerMother;
use Tests\Unit\TestCase;

final class FoodTest extends TestCase
{

    public function testShouldCreateFood(): void
    {
        // GIVEN
        $foodId = FoodId::random();
        $name = FakerMother::name();
        $proteins = FakerMother::quantity();
        $fats = FakerMother::quantity();
        $carbs = FakerMother::quantity();
        $portionType = FakerMother::randomItem(FoodPortionType::class);
        $amount = FakerMother::quantity();

        // WHEN
        $food = FoodMother::create($foodId, $name, $proteins, $fats, $carbs, $portionType, $amount);

        // THEN
        $this->assertInstanceOf(Food::class, $food);
        $this->assertEquals('draft', $food->status->value);
        $this->assertEquals($name, $food->name);
        $this->assertEquals($amount, $food->foodPortion->amount);
        $this->assertCount(1, $food->domainEvents);
        $this->assertInstanceOf(FoodCreated::class, $food->domainEvents[0]);
    }

    public function testShouldPublishFood(): void
    {
        // GIVEN
        $food = FoodMother::random();
        $food->pullDomainEvents();

        // WHEN
        $food->publish();

        // THEN
        $this->assertEquals('published', $food->status->value);
        $this->assertCount(1, $food->domainEvents);
        $this->assertInstanceOf(FoodPublished::class, $food->domainEvents[0]);
    }

    public function testShouldThrownExceptionWhenDataIsNotValid(): void
    {
        // GIVEN
        $food = FoodMother::random();
        $food->carbs = null;
        $food->pullDomainEvents();
        $this->expectException(FoodDataNotValidException::class);

        // WHEN
        $food->publish();
    }
}

<?php

namespace Tests\Unit\Core\Food\Application\Commands\CreateFood;

use Dmontielfdez\Core\Food\Application\Commands\CreateFood\CreateFoodCommand;
use Dmontielfdez\Core\Food\Domain\Enums\FoodPortionType;
use Dmontielfdez\Core\Food\Domain\Repositories\FoodRepositoryInterface;
use Dmontielfdez\Core\Food\Domain\ValueObjects\FoodId;
use Dmontielfdez\Shared\Framework\Infrastructure\Bus\EventBus\EventBusInterface;
use Mockery\MockInterface;
use Tests\Unit\FakerMother;
use Tests\Unit\TestCase;

final class CreateFoodHandlerTest extends TestCase
{
    public function testShouldCreateAFood()
    {
        // GIVEN
        $foodId = FoodId::random();
        $name = FakerMother::name();
        $proteins = FakerMother::quantity();
        $fats = FakerMother::quantity();
        $carbs = FakerMother::quantity();
        $portionType = FakerMother::randomItem(FoodPortionType::class);
        $amount = FakerMother::quantity();

        $command = new CreateFoodCommand(
            $foodId,
            $name,
            $proteins,
            $fats,
            $carbs,
            $portionType,
            $amount
        );

        $spyRepository = $this->spy(FoodRepositoryInterface::class);
        $spyEvent = $this->spy(EventBusInterface::class);

        // WHEN
        $this->commandBus()->dispatch($command);

        // THEN
        $spyRepository->shouldHaveReceived('store');
        $spyEvent->shouldHaveReceived('publishEvents');
    }
}

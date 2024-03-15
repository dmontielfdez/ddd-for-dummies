<?php

namespace Tests\Unit\Core\Food\Application\Commands\CreateFood;

use Dmontielfdez\Core\Food\Domain\Repositories\FoodRepositoryInterface;
use Dmontielfdez\Shared\Framework\Infrastructure\Bus\EventBus\EventBusInterface;
use Tests\Unit\TestCase;

final class CreateFoodHandlerTest extends TestCase
{
    public function testShouldCreateAFood()
    {
        // GIVEN
        $command = CreateFoodHandlerMother::random();

        $spyRepository = $this->spy(FoodRepositoryInterface::class);
        $spyEvent = $this->spy(EventBusInterface::class);

        // WHEN
        $this->commandBus()->dispatch($command);

        // THEN
        $spyRepository->shouldHaveReceived('store');
        $spyEvent->shouldHaveReceived('publishEvents');
    }
}

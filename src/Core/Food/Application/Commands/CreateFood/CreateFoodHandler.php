<?php

namespace Dmontielfdez\Core\Food\Application\Commands\CreateFood;

use Dmontielfdez\Core\Food\Domain\Entities\Food;
use Dmontielfdez\Core\Food\Domain\Repositories\FoodRepositoryInterface;
use Dmontielfdez\Shared\Framework\Infrastructure\Bus\CommandBus\CommandHandlerInterface;
use Dmontielfdez\Shared\Framework\Infrastructure\Bus\EventBus\EventBusInterface;

final readonly class CreateFoodHandler implements CommandHandlerInterface
{

    public function __construct(private FoodRepositoryInterface $foodRepository, private EventBusInterface $eventBus)
    {
    }

    public function __invoke(CreateFoodCommand $command): void
    {
        $food = Food::create(
            $command->id,
            $command->name,
            $command->proteins,
            $command->fats,
            $command->carbs,
            $command->type,
            $command->amount
        );

        $this->foodRepository->store($food);
        $this->eventBus->publishEvents($food->domainEvents);
    }


}

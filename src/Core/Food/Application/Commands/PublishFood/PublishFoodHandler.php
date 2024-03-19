<?php

namespace Dmontielfdez\Core\Food\Application\Commands\PublishFood;

use Dmontielfdez\Core\Food\Domain\Repositories\FoodRepositoryInterface;
use Dmontielfdez\Shared\Framework\Domain\Bus\CommandBus\CommandHandlerInterface;
use Dmontielfdez\Shared\Framework\Domain\Bus\EventBus\EventBusInterface;

final readonly class PublishFoodHandler implements CommandHandlerInterface
{

    public function __construct(private FoodRepositoryInterface $foodRepository, private EventBusInterface $eventBus)
    {
    }

    public function __invoke(PublishFoodCommand $command): void
    {
        $food = $this->foodRepository->findByIdOrFail($command->id);
        $food->publish();

        $this->foodRepository->store($food);
        $this->eventBus->publishEvents($food->domainEvents);
    }


}

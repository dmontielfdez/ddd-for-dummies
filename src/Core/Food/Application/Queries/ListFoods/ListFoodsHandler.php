<?php

namespace Dmontielfdez\Core\Food\Application\Queries\ListFoods;

use Dmontielfdez\Core\Food\Domain\ReadModels\ListFoodRM;
use Dmontielfdez\Core\Food\Domain\Repositories\FoodRepositoryInterface;
use Dmontielfdez\Shared\Framework\Infrastructure\Bus\QueryBus\QueryHandlerInterface;

final class ListFoodsHandler implements QueryHandlerInterface
{

    public function __construct(private FoodRepositoryInterface $foodRepository)
    {
    }

    /**
     * @param ListFoodsQuery $query
     * @return array<ListFoodRM>
     */
    public function __invoke(ListFoodsQuery $query): array
    {
        return $this->foodRepository->findAll();
    }


}

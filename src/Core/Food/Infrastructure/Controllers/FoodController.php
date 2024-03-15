<?php

namespace Dmontielfdez\Core\Food\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Dmontielfdez\Core\Food\Application\Commands\CreateFood\CreateFoodCommand;
use Dmontielfdez\Core\Food\Application\Commands\PublishFood\PublishFoodCommand;
use Dmontielfdez\Core\Food\Application\Queries\ListFoods\ListFoodsQuery;
use Dmontielfdez\Core\Food\Domain\Enums\FoodPortionType;
use Dmontielfdez\Core\Food\Domain\ValueObjects\FoodId;
use Dmontielfdez\Shared\Framework\Infrastructure\Bus\CommandBus\CommandBusInterface;
use Dmontielfdez\Shared\Framework\Infrastructure\Bus\QueryBus\QueryBusInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

final class FoodController extends Controller
{
    public function __construct(private QueryBusInterface $queryBus, private CommandBusInterface $commandBus)
    {
    }

    public function index(): Response
    {
        $foods = $this->queryBus->query(new ListFoodsQuery());

        return Inertia::render(
            'food/index',
            [
                'foods' => $foods,
            ]
        );
    }

    public function create(Request $request): void
    {
        $this->commandBus->dispatch(
            new CreateFoodCommand(
                FoodId::random(),
                $request->string('name'),
                $request->integer('proteins'),
                $request->integer('fats'),
                $request->integer('carbs'),
                FoodPortionType::from($request->integer('portionType')),
                $request->integer('amount'),
            )
        );
    }

    public function publish(string $foodId): void
    {
        $this->commandBus->dispatch(
            new PublishFoodCommand(FoodId::create($foodId))
        );
    }
}

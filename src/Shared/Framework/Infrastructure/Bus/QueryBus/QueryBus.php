<?php

namespace Dmontielfdez\Shared\Framework\Infrastructure\Bus\QueryBus;

use Dmontielfdez\Shared\Framework\Application\Queries\QueryInterface;
use Illuminate\Support\Facades\App;
use RuntimeException;
use function get_class;

final class QueryBus implements QueryBusInterface
{


    public function query(QueryInterface $query)
    {
        $key = get_class($query);
        $queryHandlerName = preg_replace('/Query$/', 'Handler', $key);
        if ($queryHandlerName === null) {
            throw new RuntimeException('Handler not found for query: ' . $key);
        }
        /** @var QueryHandlerInterface $queryHandler */
        $queryHandler = App::make($queryHandlerName);
        return $queryHandler->__invoke($query);
    }
}

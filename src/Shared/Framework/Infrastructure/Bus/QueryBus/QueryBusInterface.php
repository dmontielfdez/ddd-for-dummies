<?php

namespace Dmontielfdez\Shared\Framework\Infrastructure\Bus\QueryBus;


use Dmontielfdez\Shared\Framework\Application\Queries\QueryInterface;

interface QueryBusInterface
{
    /**
     * @template T
     * @param QueryInterface<T> $query
     * @return T
     */
    public function query(QueryInterface $query);

}

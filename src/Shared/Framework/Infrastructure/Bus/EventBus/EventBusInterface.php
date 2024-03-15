<?php

namespace Dmontielfdez\Shared\Framework\Infrastructure\Bus\EventBus;

use Dmontielfdez\Shared\Framework\Domain\Events\BaseEvent;
use Throwable;

interface EventBusInterface
{
    /**
     * @param BaseEvent[] $events
     * @throws Throwable
     */
    public function publishEvents(array $events): void;

}

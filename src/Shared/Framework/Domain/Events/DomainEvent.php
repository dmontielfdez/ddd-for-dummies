<?php

namespace Dmontielfdez\Shared\Framework\Domain\Events;


/**
 * @template T
 */
abstract class DomainEvent
{
    public ?int $eventId;
    public string $relatedId;
    public int $occurredOn;

    final protected function __construct(string $relatedId)
    {
        $this->relatedId = $relatedId;
        $this->occurredOn = time();
    }
}

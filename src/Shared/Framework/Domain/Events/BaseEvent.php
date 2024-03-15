<?php

namespace Dmontielfdez\Shared\Framework\Domain\Events;


use Dmontielfdez\Shared\Framework\Domain\ValueObjects\IdentifierInterface;

abstract class BaseEvent
{
    public string $relatedId;
    public int $occurredOn;

    final protected function __construct(IdentifierInterface $relatedId)
    {
        $this->relatedId = $relatedId->getValue();
        $this->occurredOn = time();
    }

}

<?php

namespace Dmontielfdez\Shared\Framework\Domain\Entities;


use Dmontielfdez\Shared\Framework\Domain\Events\BaseEvent;
use Dmontielfdez\Shared\Framework\Domain\ValueObjects\IdentifierInterface;

/**
 * @property IdentifierInterface $id
 */
abstract class BaseEntity
{
    /**
     * @var BaseEvent[]
     */
    public array $domainEvents = [];

    /**
     * @return array<BaseEvent>
     */
    public function pullDomainEvents(): array
    {
        $domainEvents = $this->domainEvents;
        $this->domainEvents = [];
        return $domainEvents;
    }

}

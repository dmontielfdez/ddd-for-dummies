<?php

namespace Dmontielfdez\Core\Food\Domain\Events;

use Dmontielfdez\Core\Food\Domain\ValueObjects\FoodId;
use Dmontielfdez\Shared\Framework\Domain\Events\BaseEvent;

final class FoodPublished extends BaseEvent
{
    public static function create(FoodId $id): self
    {
        return new self($id);
    }
}

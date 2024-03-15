<?php

namespace Dmontielfdez\Core\Food\Domain\ValueObjects;

use Dmontielfdez\Core\Food\Domain\Enums\FoodPortionType;
use Dmontielfdez\Core\Food\Domain\Exceptions\AmountNotValidException;

final class FoodPortion
{
    public FoodPortionType $type;
    public int $amount;

    /**
     * @param FoodPortionType $type
     * @param int $amount
     * @return FoodPortion
     */
    public static function createFrom(FoodPortionType $type, int $amount): self
    {
        // Close Guard
        if ($amount <= 0) {
            throw AmountNotValidException::fromAmount($amount);
        }

        $self = new self();
        $self->type = $type;
        $self->amount = $amount;

        return $self;
    }


}

<?php

namespace Dmontielfdez\Core\Food\Domain\ValueObjects;

use Dmontielfdez\Core\Food\Domain\Enums\FoodPortionType;

final class FoodPortion
{
    public FoodPortionType $type;
    public int $amount;

    /**
     * @param FoodPortionType $type
     * @param int $amount
     */
    public function __construct(FoodPortionType $type, int $amount)
    {
        $this->type = $type;
        $this->amount = $amount;
    }


}

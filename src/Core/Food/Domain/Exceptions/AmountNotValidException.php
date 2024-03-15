<?php

namespace Dmontielfdez\Core\Food\Domain\Exceptions;

use DomainException;

final class AmountNotValidException extends DomainException
{
    public static function fromAmount(int $amount): self
    {
        return new self('Amount can not be below 0. ' . $amount . 'given');
    }
}

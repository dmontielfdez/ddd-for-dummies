<?php

namespace Dmontielfdez\Core\Food\Domain\Exceptions;

use DomainException;
use function json_encode;

final class FoodDataNotValidException extends DomainException
{
    public static function fromErrors(array $errors): self
    {
        return new self(json_encode($errors));
    }
}

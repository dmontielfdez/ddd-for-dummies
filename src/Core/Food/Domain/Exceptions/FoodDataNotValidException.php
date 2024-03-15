<?php

namespace Dmontielfdez\Core\Food\Domain\Exceptions;

use DomainException;
use function json_encode;

final class FoodDataNotValidException extends DomainException
{
    /**
     * @param array<string> $errors
     * @return self
     */
    public static function fromErrors(array $errors): self
    {
        return new self(json_encode($errors, JSON_THROW_ON_ERROR));
    }
}

<?php

namespace Dmontielfdez\Shared\Framework\Domain\ValueObjects;

interface IdentifierInterface
{
    /**
     * @param string|int $value
     * @return static
     */
    public static function create(string|int $value): self;

    /**
     * @return string|int
     */
    public function getValue(): int|string;
}

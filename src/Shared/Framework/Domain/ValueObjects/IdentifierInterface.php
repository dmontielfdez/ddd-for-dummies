<?php

namespace Dmontielfdez\Shared\Framework\Domain\ValueObjects;

interface IdentifierInterface
{
    /**
     * @param string $value
     * @return static
     */
    public static function create(string $value): self;

    /**
     * @return string
     */
    public function getValue(): string;
}

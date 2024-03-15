<?php

namespace Dmontielfdez\Shared\Framework\Domain\ValueObjects;

use InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;

abstract class Uuid implements IdentifierInterface
{
    protected string $value;

    final public function __construct(string $value)
    {
        $this->ensureIsValidUuid($value);
        $this->value = $value;
    }

    /**
     * @return static
     */
    public static function random(): self
    {
        return new static(RamseyUuid::uuid4()->toString());
    }

    public function getValue(): string
    {
        return $this->value;
    }

    private function ensureIsValidUuid(string $id): void
    {
        if (false === RamseyUuid::isValid($id)) {
            throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', static::class, $id));
        }
    }

    /**
     * @param string $value
     * @return static
     */
    public static function create(string $value): self
    {
        return new static($value);
    }
}

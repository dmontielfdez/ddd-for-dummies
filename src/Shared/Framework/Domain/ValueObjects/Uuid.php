<?php

namespace Dmontielfdez\Shared\Framework\Domain\ValueObjects;

use InvalidArgumentException;
use JsonSerializable;
use Ramsey\Uuid\Uuid as RamseyUuid;

abstract class Uuid implements IdentifierInterface, JsonSerializable
{
    protected string $value;

    final public function __construct(string $value)
    {
        $this->ensureIsValidUuid($value);
        $this->value = $value;
    }

    public function jsonSerialize(): string
    {
        return $this->value;
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

    public function equals(self $other): bool
    {
        return $this->getValue() === $other->getValue();
    }

    public function __toString(): string
    {
        return $this->getValue();
    }

    private function ensureIsValidUuid(string $id): void
    {
        if (false === RamseyUuid::isValid($id)) {
            throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', static::class, $id));
        }
    }

    /**
     * @param int|string $value
     * @return static
     */
    public static function create(string|int $value): self
    {
        return new static((string)$value);
    }

    /**
     * @param string|int|null $value
     * @return static|null
     */
    public static function createOrNull(null|string|int $value): ?self
    {
        if (null === $value) {
            return null;
        }

        return new static((string)$value);
    }

    /**
     * @param string $value
     * @return static
     */
    public static function fromString(string $value): self
    {
        return new static($value);
    }
}

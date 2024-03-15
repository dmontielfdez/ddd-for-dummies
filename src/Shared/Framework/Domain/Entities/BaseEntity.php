<?php

namespace Dmontielfdez\Shared\Framework\Domain\Entities;


use Dmontielfdez\Shared\Framework\Domain\Enums\BaseEnum;
use Dmontielfdez\Shared\Framework\Domain\Events\DomainEvent;
use Dmontielfdez\Shared\Framework\Domain\ValueObjects\AutoIncrementIdentifier;
use Dmontielfdez\Shared\Framework\Domain\ValueObjects\IdentifierInterface;
use Dmontielfdez\Shared\Framework\Domain\ValueObjects\ValueObject;
use Dmontielfdez\Shared\Framework\Helpers\ArrayHelper;
use Dmontielfdez\Shared\Framework\Helpers\ObjectHelper;
use Dmontielfdez\Shared\Framework\Helpers\TraitDynamicProperties;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use JsonException;
use ReflectionClass;
use ReflectionException;
use ReflectionProperty;
use RuntimeException;
use function count;
use function in_array;

/**
 * @property IdentifierInterface $id
 */
abstract class BaseEntity
{
    /**
     * @var DomainEvent[]
     */
    protected array $domainEvents = [];

}

<?php

namespace Dmontielfdez\Core\Food\Domain\Entities;

use Dmontielfdez\Core\Food\Domain\Enums\FoodStatus;
use Dmontielfdez\Core\Food\Domain\Events\FoodCreated;
use Dmontielfdez\Core\Food\Domain\Events\FoodPublished;
use Dmontielfdez\Core\Food\Domain\Exceptions\FoodDataNotValidException;
use Dmontielfdez\Core\Food\Domain\ValueObjects\FoodId;
use Dmontielfdez\Core\Food\Domain\ValueObjects\FoodPortion;
use Dmontielfdez\Shared\Framework\Domain\Entities\BaseEntity;
use function count;

final class Food extends BaseEntity
{
    public FoodId $id;
    public FoodStatus $status;
    public string $name;
    public ?int $proteins;
    public ?int $fats;
    public ?int $carbs;
    public ?FoodPortion $foodPortion;

    public function __construct(
        FoodId $id,
        FoodStatus $status,
        string $name,
        ?int $proteins,
        ?int $fats,
        ?int $carbs,
        ?FoodPortion $foodPortion
    )
    {
        $this->id = $id;
        $this->status = $status;
        $this->name = $name;
        $this->proteins = $proteins;
        $this->fats = $fats;
        $this->carbs = $carbs;
        $this->foodPortion = $foodPortion;
    }

    public static function create(
        FoodId $id,
        string $name,
        ?int $proteins,
        ?int $fats,
        ?int $carbs,
        ?FoodPortion $foodPortion
    ): self
    {
        $self = new self(
            $id,
            FoodStatus::draft,
            $name,
            $proteins,
            $fats,
            $carbs,
            $foodPortion
        );

        $self->domainEvents[] = FoodCreated::create($id);

        return $self;
    }

    public function publish(): void
    {
        $errors = $this->checkProperties();
        if (count($errors) > 0) {
            throw FoodDataNotValidException::fromErrors($errors);
        }

        $this->status = FoodStatus::published;
        $this->domainEvents[] = FoodPublished::create($this->id);
    }

    /**
     * @return array<string>
     */
    private function checkProperties(): array
    {
        $errors = [];
        foreach ($this as $key => $value) {
            if ($value === null) {
                $errors[] = $key;
            }
        }

        return $errors;
    }


}

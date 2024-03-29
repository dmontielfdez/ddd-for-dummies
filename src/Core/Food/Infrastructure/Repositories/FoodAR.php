<?php

namespace Dmontielfdez\Core\Food\Infrastructure\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $status
 * @property string $name
 * @property ?int $proteins
 * @property ?int $fats
 * @property ?int $carbs
 * @method static create(mixed[] $extract)
 */
final class FoodAR extends Model
{
    protected $table = 'food';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'status',
        'name',
        'proteins',
        'fats',
        'carbs',
    ];

}

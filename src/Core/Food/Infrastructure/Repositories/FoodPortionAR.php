<?php

namespace Dmontielfdez\Core\Food\Infrastructure\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $foodId
 * @property int $type
 * @property ?int $amount
 */
final class FoodPortionAR extends Model
{
    protected $table = 'food_portion';
    protected $fillable = [
        'foodId',
        'type',
        'amount',
    ];

    public $timestamps = false;

}

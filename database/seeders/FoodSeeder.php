<?php

namespace Database\Seeders;

use Dmontielfdez\Core\Food\Domain\Enums\FoodPortionType;
use Dmontielfdez\Core\Food\Domain\Enums\FoodStatus;
use Dmontielfdez\Core\Food\Domain\ValueObjects\FoodId;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use function time;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $foodId = FoodId::random();
        DB::table('food')->insert(
            [
                'id' => $foodId->getValue(),
                'status' => FoodStatus::published->value,
                'name' => 'Serranito de Pollo',
                'proteins' => 20,
                'fats' => 7,
                'carbs' => 14,
                'created_at' => Date::now(),
                'updated_at' => Date::now()
            ]
        );

        DB::table('food_portion')->insert(
            [
                'foodId' => $foodId->getValue(),
                'type' => FoodPortionType::uds,
                'amount' => 1
            ]
        );
    }
}

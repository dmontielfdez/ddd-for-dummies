<?php

namespace Tests\Unit;

use Faker\Generator as Faker;
use Illuminate\Support\Facades\App;

final class FakerMother
{
    private static ?Faker $faker = null;

    public static function getFaker(): Faker
    {
        if (self::$faker === null) {
            /** @var Faker $faker */
            self::$faker = App::make(Faker::class);

        }

        return self::$faker;
    }

    public static function quantity(int $min = 1, int $max = 2000): int
    {
        return self::getFaker()->numberBetween($min, $max);
    }


    public static function name(): string
    {
        return self::getFaker()->name;
    }

    /**
     * @param class-string<\BackedEnum> $class
     */
    public static function randomItem(string $class): mixed
    {
        return self::getFaker()->randomElement($class::cases());
    }
}

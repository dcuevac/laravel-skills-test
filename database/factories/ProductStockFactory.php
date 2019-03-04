<?php

use App\Models\ProductStock;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(ProductStock::class, function (Faker $faker) {
    return [
        'data' => [
            'name' => 'Product #' . $faker->numberBetween(1, 1000),
            'quantity' => $faker->numberBetween(1, 10),
            'price' => $faker->numberBetween(1, 100)
        ],
    ];
});

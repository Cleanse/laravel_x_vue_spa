<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Product;
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

$factory->define(Product::class, function (Faker $faker) {
    return [
        'product_type_id' => factory('App\ProductType')->create()->id,
        'name' => $faker->word,
        'active' => $faker->boolean
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Restaurant;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, fn (Faker $faker) => [
    'name' => $faker->company
]);

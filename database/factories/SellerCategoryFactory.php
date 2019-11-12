<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SellerCategory;
use Faker\Generator as Faker;

$factory->define(SellerCategory::class, function (Faker $faker) {
    return [
        'title' => $faker->company,
    ];
});

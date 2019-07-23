<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Listing;
use Faker\Generator as Faker;

$factory->define(Listing::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'website' => $faker->domainName,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'bio' => $faker->paragraph,
    ];
});

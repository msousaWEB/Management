<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SiteContact;
use Faker\Generator as Faker;

$factory->define(SiteContact::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'tel' => $faker->tollFreePhoneNumber,
        'email' => $faker->unique()->email,
        'reason_contact' => $faker->numberBetween(1,3),
        'message' => $faker->text(200)
    ];
});

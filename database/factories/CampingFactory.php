<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(\App\Camping::class, function (Faker $faker) {
    $id = $faker->numberBetween(1, 500);
    return [
        'country' => $faker->country,
        'city' => $faker->city,
        'name' => $faker->name,
        'link' => 'https://www.google.lt',
        'rating' => $faker->numberBetween(1, 10),
        'reviews' => $faker->numberBetween(1, 10),
        'tags' => ["one", "two", "three"],
        'image' => "https://picsum.photos/id/$id/350/250"
    ];
});

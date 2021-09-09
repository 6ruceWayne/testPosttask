<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'text' => $faker->sentence(4),
        'views' => rand(1, 20)*50,
        'image' => rand(0, 1) == 1 ?'https://source.unsplash.com/random' : ''
    ];
});

<?php

/** @var Factory $factory */

use App\Kanban;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Kanban::class, function (Faker $faker) {
    return [
        "title" => $faker->title,
        "introduction" => $faker->paragraph,
    ];
});

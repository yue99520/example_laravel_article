<?php

/** @var Factory $factory */

use App\Kanban;
use App\Post;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Post::class, function (Faker $faker) {
    return [
        "title" => $faker->sentence,
        "body" => $faker->paragraph,
        "user_id" => function () {
            return factory(User::class)->create()->id;
        },
        "kanban_id" => function () {
            return factory(Kanban::class)->create()->id;
        }
    ];
});

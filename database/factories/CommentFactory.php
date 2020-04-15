<?php

/** @var Factory $factory */

use App\Comment;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        "body" => $faker->paragraph,
        "user_id" => function () {
            return factory(User::class)->create()->id;
        }
    ];
});

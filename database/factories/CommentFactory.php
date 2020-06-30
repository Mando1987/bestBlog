<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [

        'user_id'         => mt_rand(1 ,12),
        'post_id'         => mt_rand(1 ,22),
        'comment_content' => $faker->sentence
    ];
});

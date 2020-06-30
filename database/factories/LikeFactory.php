<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Like;
use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker) {
    return [
        'user_id' => mt_rand(1 ,12),
        'post_id' => mt_rand(1 ,22),
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
   
        return [
            'post_content'  => $faker->paragraph,
            'user_id'       => mt_rand(1 ,12),
            'privacy'       => 'public',
        ];
});

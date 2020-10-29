<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'         => $faker->name,
        'slug'          => $faker->unique()->slug,
        'content'       => $faker->text(800),
        'created_at'    => now(),
        'updated_at'    => now(),
    ];
});

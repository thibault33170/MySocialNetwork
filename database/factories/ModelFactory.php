<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'username' => $faker->word,
        'dob' => Carbon\Carbon::parse('July 6 1993'),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {

    return [
        'user_id' => App\User::all()->random()->id,
        'content' => $faker->paragraph(5),
    ];
});

$factory->define(App\Like::class, function (Faker\Generator $faker) {

    return [
        'user_id' => App\User::all()->random()->id,
        'article_id' => App\Article::all()->random()->id,
    ];
});

$factory->define(App\Follow::class, function (Faker\Generator $faker) {

    $follower = App\User::all()->random()->id;
    $target = App\User::where('id', '!=', $follower)->get()->random()->id;
    return [
        'follower_id' => $follower,
        'target_id' => $target,
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {

    return [
        'article_id' => $follower = App\Article::all()->random()->id,
        'user_id' => $follower = App\User::all()->random()->id,
        'content' => $faker->paragraph(2),
    ];
});

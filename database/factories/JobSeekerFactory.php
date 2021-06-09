<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\JobSeeker;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(JobSeeker::class, function (Faker $faker) {
    return [
        //
        'username' => $faker->userName,
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

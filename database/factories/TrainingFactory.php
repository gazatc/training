<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Training;
use Faker\Generator as Faker;

$factory->define(Training::class, function (Faker $faker) {
    return [
        //
        'employer_id' => factory(\App\Employer::class)->create(['verified' => 1])->id,
        'category_id' => factory(\App\Category::class)->create()->id,
        'region_id' => factory(\App\Region::class)->create()->id,
        'title' => $faker->title,
        'description' => $faker->text,
        'requirement' => $faker->text,
        'last_date' => $faker->date()
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Step;
use Faker\Generator as Faker;

$factory->define(Step::class, function (Faker $faker) {
  $faker_ja = \Faker\Factory::create('ja_JP');
  $created_at = $faker->dateTimeBetween('-120 days', '-20 days', 'Asia/Tokyo');
  $updated_at = (clone $created_at)->modify('+' . $faker->numberBetween(1, 15) . ' Days');
  $user = App\User::inRandomOrder()->first();
  return [
    'user_id' => $user->id,
    'title' => $faker_ja->word,
    'category' => $faker_ja->word,
    //'achievement_time' => $faker_ja->randomNumber(),
    'content' => $faker_ja->paragraph(),
    'created_at' => $created_at,
    'updated_at' => $updated_at
  ];
});

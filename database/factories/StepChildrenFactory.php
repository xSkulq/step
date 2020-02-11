<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\StepChild;
use Faker\Generator as Faker;

$factory->define(StepChild::class, function (Faker $faker) {
  $faker_ja = \Faker\Factory::create('ja_JP');
  $created_at = $faker->dateTimeBetween('-120 days', '-20 days', 'Asia/Tokyo');
  $updated_at = (clone $created_at)->modify('+' . $faker->numberBetween(1, 15) . ' Days');
  $step_id = App\Step::inRandomOrder()->first();
  return [
    'step_id' => $step_id->id,
    'title' => $faker_ja->word,
    'content' => $faker_ja->paragraph(),
    'created_at' => $created_at,
    'updated_at' => $updated_at
  ];
});

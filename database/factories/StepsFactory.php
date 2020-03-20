<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Step;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Step::class, function (Faker $faker) {
  $faker_ja = \Faker\Factory::create('ja_JP');
  $created_at = $faker->dateTimeBetween('-120 days', '-20 days', 'Asia/Tokyo');
  $updated_at = (clone $created_at)->modify('+' . $faker->numberBetween(1, 15) . ' Days');
  $user = App\User::inRandomOrder()->first();
  $category = Category::inRandomOrder()->first();

  return [
    'user_id' => $user->id,
    'title' => $faker_ja->word,
    'category_id' => $category->id,
    'achievement_time' => '1時間',
    'content' => $faker_ja->paragraph(),
    'created_at' => $created_at,
    'updated_at' => $updated_at
  ];
});

<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert([
      'name' => '紗倉',
      'email' => 'anko0431+general@gmail.com',
      'password' => bcrypt('testpass'),
      'email_verified_at' => Carbon::now()
    ]);
    DB::table('users')->insert([
      'name' => '雨風',
      'email' => 'kirine0431+general@gmail.com',
      'password' => bcrypt('testpass'),
      'email_verified_at' => Carbon::now()
    ]);
    DB::table('users')->insert([
      'name' => '月見',
      'email' => 'mea0431+general@gmail.com',
      'password' => bcrypt('testpass'),
      'email_verified_at' => Carbon::now()
    ]);
  }
}

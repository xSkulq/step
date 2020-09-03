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
      'name' => 'test',
      'email' => 'test0431+general@gmail.com',
      'password' => bcrypt('testpass'),
      'email_verified_at' => Carbon::now()
    ]);
    DB::table('users')->insert([
      'name' => 'テスト',
      'email' => 'test10431+general@gmail.com',
      'password' => bcrypt('testpass'),
      'email_verified_at' => Carbon::now()
    ]);
    DB::table('users')->insert([
      'name' => '砂糖',
      'email' => 'satou0431+general@gmail.com',
      'password' => bcrypt('testpass'),
      'email_verified_at' => Carbon::now()
    ]);
  }
}

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
        'name' => 'admin_sakura',
        'email' => 'anko0431+admin@gmail.com',
        'password' => bcrypt('testpass'),
        'type' => 'admin',
        'email_verified_at' => Carbon::now()
      ]);
    }
}

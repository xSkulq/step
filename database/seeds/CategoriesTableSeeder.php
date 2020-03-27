<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categories = [
        ['code' => 1, 'name' => 'プログラミング'],
        ['code' => 2, 'name' => '英語'],
        ['code' => 3, 'name' => 'イラスト'],
        ['code' => 4, 'name' => '漫画'],
        ['code' => 5, 'name' => 'ブログ'],
        ['code' => 6, 'name' => '動画編集'],
        ['code' => 7, 'name' => 'スピーチ'],
            
      ];
      DB::table('categories')->insert($categories);
    }
}

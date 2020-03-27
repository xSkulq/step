<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('code')->default(0);
            $table->text('name');
            $table->timestamps();
            $table->softDeletes();
        });

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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}

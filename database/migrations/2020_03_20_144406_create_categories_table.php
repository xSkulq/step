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
            ['code' => 2, 'name' => 'プログラミング'],
            ['code' => 12, 'name' => '英語'],
            ['code' => 22, 'name' => 'イラスト'],
            ['code' => 32, 'name' => '漫画'],
            ['code' => 42, 'name' => 'ブログ'],
            ['code' => 52, 'name' => '動画編集'],
            ['code' => 62, 'name' => 'スピーチ'],
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

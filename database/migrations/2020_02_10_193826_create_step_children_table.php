<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStepChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('step_children', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('step_id');
            $table->string('title');
            $table->text('content');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('step_id')->references('id')->on('steps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('step_children');
    }
}

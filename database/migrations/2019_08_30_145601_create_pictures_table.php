<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pictures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 50)->comment('相册标题');
            $table->string('body', 255)->nullable()->comment('相册简介');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('pictures');
    }
}

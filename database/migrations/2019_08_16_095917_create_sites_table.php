<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url')->nullable()->comment('网站域名');
            $table->string('title')->nullable()->comment('网站标题');
            $table->string('keywords')->nullable()->comment('网站关键字');
            $table->string('description')->nullable()->comment('网站描述');
            $table->string('num')->nullable()->comment('备案号');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('sites');
    }
}

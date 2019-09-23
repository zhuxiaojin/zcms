<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('notices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('manager_id')->comment('发布人');
            $table->string('title', 30)->comment('标题');
            $table->text('body')->comment('内容');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('notices');
    }
}

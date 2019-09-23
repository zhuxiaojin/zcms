<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldTitleToTablePermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('permissions', function (Blueprint $table) {
            //
            $table->string('title', 100)->comment('标题');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('permissions', function (Blueprint $table) {
            //
            $table->dropColumn('title');
        });
    }
}

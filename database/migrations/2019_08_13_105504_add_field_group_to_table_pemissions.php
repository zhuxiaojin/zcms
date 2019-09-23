<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldGroupToTablePemissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('permissions', function (Blueprint $table) {
            //
            $table->string('group', 100)->nullable()->comment('分组信息');
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
            $table->dropColumn('group');
        });
    }
}

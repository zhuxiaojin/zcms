<?php

use Illuminate\Database\Seeder;

class RoleHasPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //
        $sql = <<<SQL
INSERT INTO `sooc_role_has_permissions` (`permission_id`, `role_id`)
VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(14, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1),
	(19, 1),
	(20, 1),
	(21, 1),
	(22, 1),
	(23, 1),
	(24, 1),
	(25, 1),
	(26, 1),
	(27, 1),
	(28, 1),
	(29, 1),
	(30, 1),
	(31, 1),
	(32, 1),
	(33, 1),
	(34, 1);
SQL;
        DB::unprepared($sql);
        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => 'App\Models\Manager',
            'model_id' => 1,
        ]);
        DB::table('options')->insert([
            'key' => 'PAGE_SIZE',
            'value' => 10,
            'name' => '分页数量',
        ]);
    }
}

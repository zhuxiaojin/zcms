<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //
        $sql = <<<SQL
        INSERT INTO `sooc_roles` ( `name`, `guard_name`, `created_at`, `updated_at`, `title`)
VALUES
('super-admin', 'manager', '2019-08-14 20:51:55', '2019-08-15 09:09:27', '超级管理员'),
	('admin', 'manager', '2019-08-15 09:09:59', '2019-08-15 09:09:59', '普通管理员');
SQL;
        DB::unprepared($sql);
    }

}

<?php

use Illuminate\Database\Seeder;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('managers')->insert([
            'name' => '超级管理员',
            'email' => 'admin@admin.com',
            'password' => bcrypt('111111'),
        ],[
            'name' => '普通管理员',
            'email' => 'second@admin.com',
            'password' => bcrypt('111111'),
        ]);
    }
}

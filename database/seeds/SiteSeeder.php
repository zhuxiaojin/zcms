<?php

use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //
        $sql = <<<SQL
INSERT INTO `sooc_sites` (`id`, `url`, `title`, `keywords`, `description`, `num`, `created_at`, `updated_at`)
VALUES
	(1, 'http://blog.com', '个人blog网站', '学习，分享，php，laravel', '这是一个学习分享的php网站', '鲁备 20190803213', NULL, '2019-08-19 13:21:50');
SQL;
        DB::unprepared($sql);
    }
}

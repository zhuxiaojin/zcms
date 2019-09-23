<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sql = <<<sql
INSERT INTO `sooc_menus` (`id`, `title`, `order`, `url`, `class`, `_lft`, `_rgt`, `parent_id`, `created_at`, `updated_at`)
VALUES
	(10, '权限管理', 3, NULL, 'icon-people', 1, 8, NULL, '2019-08-20 08:29:56', '2019-08-21 15:45:43'),
	(14, '首页', 1, 'admin.home', 'fi-air-play', 9, 10, NULL, '2019-08-21 15:09:35', '2019-08-21 15:45:43'),
	(15, '内容管理', 2, NULL, 'fi-paper', 11, 16, NULL, '2019-08-21 15:14:32', '2019-08-21 15:45:43'),
	(19, '系统管理', 4, NULL, 'fi-monitor', 19, 30, NULL, '2019-08-21 15:16:58', '2019-08-21 15:45:43'),
	(11, '权限列表', 2, 'admin.permission.index', NULL, 2, 3, 10, '2019-08-20 08:30:22', '2019-08-21 15:45:43'),
	(12, '用户信息', 1, 'admin.manager.index', NULL, 4, 5, 10, '2019-08-20 17:08:34', '2019-08-21 15:45:43'),
	(13, '权限分组', 3, 'admin.role.index', NULL, 6, 7, 10, '2019-08-20 17:09:10', '2019-08-21 15:45:43'),
	(26, '文章管理', 11, 'admin.article.index', NULL, 14, 15, 15, '2019-08-21 15:24:26', '2019-08-21 15:45:43'),
	(23, '网站设置', 1, 'admin.site.index', NULL, 24, 25, 19, '2019-08-21 15:22:29', '2019-08-21 15:45:43'),
	(24, '配置管理', 2, 'admin.option.index', NULL, 26, 27, 19, '2019-08-21 15:23:06', '2019-08-21 15:45:43'),
	(25, '菜单管理', 3, 'admin.menu.index', NULL, 28, 29, 19, '2019-08-21 15:24:01', '2019-08-21 15:45:43');
sql;
        DB::unprepared($sql);
    }
}

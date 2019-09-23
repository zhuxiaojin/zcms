<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //
        $sql = <<<SQL
        INSERT INTO `sooc_permissions` (`name`, `guard_name`, `created_at`, `updated_at`, `title`, `group`)
        VALUES
    ( 'admin.home', 'manager', '2019-08-15 08:48:52', '2019-08-15 08:48:52', '首页', '首页'),
	( 'admin.permission.index', 'manager', '2019-08-15 08:49:38', '2019-08-15 08:49:38', '权限列表', '权限列表'),
	( 'admin.permission.create', 'manager', '2019-08-15 08:50:03', '2019-08-15 08:50:52', '新增权限', '权限列表'),
	('admin.permission.edit', 'manager', '2019-08-15 08:50:41', '2019-08-15 08:50:41', '编辑权限', '权限列表'),
	( 'admin.permission.update', 'manager', '2019-08-15 08:51:20', '2019-08-20 16:14:20', '更新权限', '权限列表'),
	( 'admin.manager.index', 'manager', '2019-08-20 15:59:34', '2019-08-20 16:00:29', '用户列表', '用户信息'),
	( 'admin.manager.create', 'manager', '2019-08-20 15:59:57', '2019-08-20 16:00:21', '新增用户', '用户信息'),
	( 'admin.manager.edit', 'manager', '2019-08-20 16:01:05', '2019-08-20 16:03:36', '编辑用户', '用户信息'),
	( 'admin.manager.update', 'manager', '2019-08-20 16:01:30', '2019-08-20 16:12:38', '更新用户', '用户信息'),
	('admin.role.index', 'manager', '2019-08-20 16:02:40', '2019-08-20 16:02:40', '权限组列表', '权限组管理'),
	('admin.role.create', 'manager', '2019-08-20 16:03:24', '2019-08-20 16:03:24', '新增权限组', '权限组管理'),
	( 'admin.manager.store', 'manager', '2019-08-20 16:13:04', '2019-08-20 16:13:04', '保存用户', '用户信息'),
	( 'admin.permission.store', 'manager', '2019-08-20 16:14:45', '2019-08-20 16:15:00', '保存权限', '权限列表'),
	('admin.role.edit', 'manager', '2019-08-20 16:15:42', '2019-08-20 16:15:42', '编辑权限组', '权限组管理'),
	('admin.role.store', 'manager', '2019-08-20 16:46:08', '2019-08-20 16:46:08', '保存权限组', '权限组管理'),
	('admin.role.update', 'manager', '2019-08-20 16:46:34', '2019-08-20 16:46:34', '更新权限组', '权限组管理'),
	('admin.site.edit', 'manager', '2019-08-20 16:53:24', '2019-08-20 16:53:24', '网站信息编辑', '网站设置'),
	('admin.site.update', 'manager', '2019-08-20 16:53:55', '2019-08-20 16:53:55', '网站信息保存', '网站设置'),
	('admin.option.index', 'manager', '2019-08-20 16:54:50', '2019-08-20 16:54:50', '配置列表', '配置管理'),
	( 'admin.option.create', 'manager', '2019-08-20 16:55:46', '2019-08-20 16:55:46', '新增配置', '配置管理'),
	('admin.option.store', 'manager', '2019-08-20 16:56:17', '2019-08-20 16:56:32', '保存配置', '配置管理'),
	('admin.option.destroy', 'manager', '2019-08-20 16:57:16', '2019-08-20 16:57:16', '删除配置', '配置管理'),
	('admin.option.edit', 'manager', '2019-08-20 16:57:45', '2019-08-20 16:57:45', '编辑配置', '配置管理'),
	( 'admin.option.update', 'manager', '2019-08-20 16:58:06', '2019-08-20 16:58:06', '更新配置', '配置管理'),
	( 'admin.role.destroy', 'manager', '2019-08-20 16:58:39', '2019-08-20 16:58:39', '删除权限组', '权限组管理'),
	('admin.permission.destroy', 'manager', '2019-08-20 16:59:53', '2019-08-20 17:04:02', '删除权限', '权限列表'),
	( 'admin.menu.index', 'manager', '2019-08-20 17:00:37', '2019-08-20 17:00:37', '菜单列表', '菜单管理'),
	('admin.menu.create', 'manager', '2019-08-20 17:01:03', '2019-08-20 17:01:03', '新增菜单', '菜单管理'),
	('admin.menu.store', 'manager', '2019-08-20 17:01:31', '2019-08-20 17:01:31', '保存菜单', '菜单管理'),
	('admin.menu.destroy', 'manager', '2019-08-20 17:01:48', '2019-08-20 17:01:48', '删除菜单', '菜单管理'),
	( 'admin.menu.edit', 'manager', '2019-08-20 17:02:08', '2019-08-20 17:02:08', '编辑菜单', '菜单管理'),
	( 'admin.menu.update', 'manager', '2019-08-20 17:02:30', '2019-08-20 17:02:30', '更新菜单', '菜单管理'),
	('admin.site.index', 'manager', '2019-08-21 15:20:37', '2019-08-21 15:20:37', '网站设置首页', '网站设置'),
	('admin.article.index', 'manager', '2019-08-21 15:20:54', '2019-08-21 15:20:54', '文章管理', '文章管理');
SQL;
        DB::unprepared($sql);
    }
}

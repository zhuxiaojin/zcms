<?php
 //面包屑管理
Breadcrumbs::for('admin.home', function ($trail) {
    $trail->push('首页', route('admin.home'));
});
/**
 *  用户管理
 */
Breadcrumbs::for('admin.manager.index', function ($trail) {
    $trail->push('用户信息', route('admin.manager.index'));
});
Breadcrumbs::for('admin.manager.create', function ($trail) {
    $trail->parent('admin.manager.index');
    $trail->push('新增用户', route('admin.manager.create'));
});
Breadcrumbs::for('admin.manager.edit', function ($trail,$manager) {
    $trail->parent('admin.manager.index');
    $trail->push($manager->name, route('admin.manager.edit',$manager));
});
/**
 *  权限列表
 */
Breadcrumbs::for('admin.permission.index', function ($trail) {
    $trail->push('权限列表', route('admin.permission.index'));
});
Breadcrumbs::for('admin.permission.create', function ($trail) {
    $trail->parent('admin.permission.index');
    $trail->push('新增权限', route('admin.permission.create'));
});
Breadcrumbs::for('admin.permission.edit', function ($trail,$permission) {
    $trail->parent('admin.permission.index');
    $trail->push($permission->title, route('admin.permission.edit',$permission));
});
/**
 * 权限组
 */
Breadcrumbs::for('admin.role.index', function ($trail) {
    $trail->push('权限组', route('admin.role.index'));
});
Breadcrumbs::for('admin.role.create', function ($trail) {
    $trail->parent('admin.role.index');
    $trail->push('新增权限组', route('admin.role.create'));
});
Breadcrumbs::for('admin.role.edit', function ($trail,$role) {
    $trail->parent('admin.role.index');
    $trail->push($role->title, route('admin.role.edit',$role));
});
Breadcrumbs::for('admin.role.members', function ($trail,$role) {
    $trail->parent('admin.role.index');
    $trail->push('人员列表', route('admin.role.edit',$role));
});
Breadcrumbs::for('admin.permission.permissions', function ($trail,$role) {
    $trail->parent('admin.role.index');
    $trail->push('授权列表', route('admin.permission.permissions',$role));
});
/**
 * 菜单管理
 */
Breadcrumbs::for('admin.menu.index', function ($trail) {
    $trail->push('菜单管理', route('admin.menu.index'));
});
Breadcrumbs::for('admin.menu.create', function ($trail) {
    $trail->push('新增菜单', route('admin.menu.index'));
});
Breadcrumbs::for('admin.menu.edit', function ($trail,$menu) {
    $trail->parent('admin.menu.index');
    $trail->push($menu->title, route('admin.menu.edit',$menu));
});
/**
 * 配置管理
 */
Breadcrumbs::for('admin.option.index', function ($trail) {
    $trail->push('配置管理', route('admin.option.index'));
});
Breadcrumbs::for('admin.option.create', function ($trail) {
    $trail->parent('admin.option.index');
    $trail->push('新增配置', route('admin.option.create'));
});
Breadcrumbs::for('admin.option.edit', function ($trail,$option) {
    $trail->parent('admin.option.index');
    $trail->push($option->name, route('admin.option.edit',$option));
});
/**
 * 网站设置
 */
/**
 * 内容管理
 *
 */
Breadcrumbs::for('admin.notice.index', function ($trail) {
    $trail->push('通知管理', route('admin.notice.index'));
});
Breadcrumbs::for('admin.notice.create', function ($trail) {
    $trail->parent('admin.notice.index');
    $trail->push('新增通知', route('admin.option.create'));
});
Breadcrumbs::for('admin.notice.edit', function ($trail,$notice) {
    $trail->parent('admin.notice.index');
    $trail->push($notice->title, route('admin.notice.edit',$notice));
});
/**
 *  相册管理
 *
 */
Breadcrumbs::for('admin.picture.index', function ($trail) {
    $trail->push('相册管理', route('admin.picture.index'));
});
Breadcrumbs::for('admin.picture.create', function ($trail) {
    $trail->parent('admin.picture.index');
    $trail->push('新增相册', route('admin.picture.create'));
});
Breadcrumbs::for('admin.picture.edit', function ($trail,$picture) {
    $trail->parent('admin.picture.index');
    $trail->push($picture->title, route('admin.picture.edit',$picture));
});

/**
 * 文章管理
 */

Breadcrumbs::for('admin.article.index', function ($trail) {
    $trail->push('文章管理', route('admin.article.index'));
});
Breadcrumbs::for('admin.article.create', function ($trail) {
    $trail->parent('admin.article.index');
    $trail->push('新增文章', route('admin.article.create'));
});
Breadcrumbs::for('admin.article.edit', function ($trail,$article) {
    $trail->parent('admin.article.index');
    $trail->push($article->title, route('admin.article.edit',$article));
});
/**
 * 产品管理
 */

Breadcrumbs::for('admin.product.index', function ($trail) {
    $trail->push('产品管理', route('admin.article.index'));
});
Breadcrumbs::for('admin.product.create', function ($trail) {
    $trail->parent('admin.product.index');
    $trail->push('新增产品', route('admin.article.create'));
});
Breadcrumbs::for('admin.product.edit', function ($trail,$product) {
    $trail->parent('admin.product.index');
    $trail->push($product->name, route('admin.article.edit',$product));
});

<?php

namespace App\Repositories;

use App\Models\Menu;
use CrCms\Repository\AbstractRepository;

/**
 * Class MenuRepository
 * @package App\Repositories
 */
class MenuRepository extends AbstractRepository
{
    protected $guard = ['title', 'url', '_lft', '_rgt', 'class', 'parent_id','order'];

    /**
     * @return Menu
     */
    public function newModel(): Menu {
        return app(Menu::class);
    }
    /**
     * @param bool $except
     * @param int $id
     * @return array
     */
    public function menuList($except = false, $id = 0) {
        $data = $this->newModel()->where('parent_id', null)->when($except, function ($query) use ($id) {
            $query->where('id', '!=', $id);
        })->orderBy('order', 'asc')->select(['id', 'title', 'parent_id'])->get();
        $menus = [];
        $menus [0] = '顶级菜单';
        foreach ($data as $menu) {
            $menus[$menu->id] = $menu->title;
        }
        return $menus;
    }
}

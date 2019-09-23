<?php
/**
 * Created by PhpStorm.
 * User: storm 朱晓进 qhj1989@qq.com
 * Date: 2019/4/11
 * Time: 9:13 PM
 */

namespace App\Presenters;


use App\Models\Manager;
use App\Repositories\MenuRepository;
use Spatie\Menu\Link;
use Spatie\Menu\Menu;

class MenuPresenter
{
    protected $repository;

    public function __construct() {
        $this->repository = new MenuRepository();
    }

    /**
     * @return Menu
     */
    public function createMenu() {
        $menus = $this->repository->where('parent_id', null)->orderBy('order', 'asc')->get();
        $html = Menu::new()
            ->addClass('metismenu')->setAttribute('id', 'side-menu"');
        foreach ($menus as $k => $menu) {
            $html->submenuIf($this->show($menu), Link::to('javascript:void(0)', $this->top($menu)), function ($item) use ($menu) {
                $all = $menu->children()->orderBy('order', 'asc')->get();
                $node = $item->addClass('nav-second-level collapse')->setAttributes(['aria-expanded' => 'false']);
                foreach ($all as $value) {
                    $node->linkIf(auth('manager')->user()->hasPermissionTo($value->url), route($value->url), $value->title);
                }
            });
        }
        \Cache::add('html', $html);
        return $html;
    }

    /**
     * @param \App\Models\Menu $menu 判断是否有下拉项菜单
     * @return string
     */
    private function top(\App\Models\Menu $menu) {
        $str = '<i class = ' . $menu->class . '></i><span> ' . $menu->title . ' </span>';
        if (!$menu->url) {
            $str .= '<span class = "menu-arrow"></span>';
        }
        return $str;
    }

    /**
     * @param Menu $menu
     * @return mixed
     */
    private function show(\App\Models\Menu $menu) {
        if ($menu->url) {
            return auth('manager')->user()->hasPermissionTo($menu->url);
        }
        return auth('manager')->user()->hasAnyPermission(\Arr::flatten($menu->children()->withoutRoot()->select('url')->get()->toArray()));
    }
}

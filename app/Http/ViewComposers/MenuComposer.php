<?php
/**
 * Created by PhpStorm.
 * User: zhuxiaojin
 * Date: 2019/8/15
 * Time: 1:31 PM
 */

namespace App\Http\ViewComposers;


use App\Models\Site;
use Illuminate\View\View;
use App\Models\Manager;
use App\Repositories\MenuRepository;
use Spatie\Menu\Link;
use Spatie\Menu\Menu;
use Spatie\Permission\Models\Permission;

class MenuComposer
{
    protected $repository;

    public function __construct() {
        $this->repository = new MenuRepository();
    }
    /**
     * @param View $view
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function compose(View $view) {
        $cache = \Cache::get('menus');
        if ($cache) {
            $view->with('menus', $cache);
            return;
        }
        $menus = $this->repository->where('parent_id', null)->orderBy('order', 'asc')->get();
        $html = Menu::new()
            ->addClass('metismenu')->setAttribute('id', 'side-menu');
        foreach ($menus as $k => $menu) {
            if ($menu->url) {
                $html->linkIf($this->show($menu), route($menu->url), $this->top($menu));
            } else {
                $html->submenuIf($this->show($menu), Link::to($menu->url ? route($menu->url) : 'javascript:void(0)', $this->top($menu)), function ($item) use ($menu) {
                    $all = $menu->children()->orderBy('order', 'asc')->get();
                    $node = $item->addClass('nav-second-level collapse')->setAttributes(['aria-expanded' => 'false']);
                    foreach ($all as $value) {
                        if (Permission::where('name', $value->url)->get()->isEmpty()) {
                            continue;
                        }
                        if ($value->url) {
                            $node->linkIf(auth('manager')->user()->hasPermissionTo($value->url), route($value->url), $value->title);
                        } else {
                            $node->link('javascript:void(0)', $value->title);
                        }
                    }
                });
            }
        }
        \Cache::set('menus', $html);
        $view->with('menus', $html);
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
            if (Permission::where('name', $menu->url)->get()->isEmpty()) {
                return false;
            }
            return auth('manager')->user()->hasPermissionTo($menu->url);
        }
        $arr = $menu->children()->withoutRoot()->select('url')->get()->reject(function ($value) {
            return Permission::where('name', $value->url)->get()->isEmpty();
        })->toArray();
        return auth('manager')->user()->hasAnyPermission(\Arr::flatten($arr));
    }


}

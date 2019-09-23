<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\MenuRequest;
use App\Models\Manager;
use App\Models\Menu;
use App\Repositories\Magic\MenuMagic;
use App\Repositories\MenuRepository;
use Composer\Cache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    protected $repository;

    public function __construct() {
        $this->middleware('auth:manager');
        $this->repository = new MenuRepository();
        view()->share('title', '菜单管理');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $data['title'] = $data['url'] = $request->get('keywords');
        $list = $this->repository->magic(new MenuMagic($data))->orderBy('id')->paginate(option('PAGE_SIZE'));
        return view('admin.menu.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        $menus = $this->repository->menuList();
        return view('admin.menu.create', compact('menus'));
    }

    /**
     * @param MenuRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function store(MenuRequest $request) {
        $this->repository->create($request->all());
        return redirect(route('admin.menu.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu) {
        //
        $menus = $this->repository->menuList(true,$menu->id);
        return view('admin.menu.edit', compact('menu', 'menus'));
    }

    /**
     * @param MenuRequest $request
     * @param Menu $menu
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function update(MenuRequest $request, Menu $menu) {
        //
        $this->repository->update($request->all(), $menu->id);
        return redirect(route('admin.menu.index'));
    }

    /**
     * @param Menu $menu
     * @return \Illuminate\Http\JsonResponse
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function destroy(Menu $menu) {
        $menu->delete();
        return response()->json(['code' => 200]);
    }
}

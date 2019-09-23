<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\RoleHasPermissionsRequest;
use App\Http\Requests\Admin\RoleRequest;
use App\Models\Manager;
use App\Models\User;
use App\Repositories\Magic\ManagerMagic;
use App\Repositories\Magic\RoleMagic;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

/**
 * Class RoleController
 * @package App\Http\Controllers\Admin
 */
class RoleController extends Controller
{
    /**
     * @var RoleRepository
     */
    private $repository;

    /**
     * RoleController constructor.
     */
    public function __construct() {
        $this->middleware('auth:manager');

        view()->share('title', '权限组管理');
        $this->repository = new RoleRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        //
        $search['name'] = $search['title'] = $request->get('keywords');
        $list = $this->repository->magic(new RoleMagic($search))->orderBy('id')->paginate(option('PAGE_SIZE'));
        return view('admin.role.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request) {
        //
        $this->repository->create($request->all());
        flash()->success('权限组创建成功');
        return redirect(route('admin.role.index'));
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
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Role $role) {
        //
        return view('admin.role.edit', compact('role'));
    }

    /**
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Role $role) {
        //
        $this->repository->update($request->all(), $role->id);
        flash()->success('权限组编辑成功');
        return redirect(route('admin.role.index'));
    }

    /**
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function members(Request $request, Role $role) {
        $list = $this->repository->members($role, $request->get('keywords'));
        return view('admin.role.members', compact('list', 'role'));
    }

    /**
     * @param Role $role
     * @param Manager $manager
     * @return \Illuminate\Http\JsonResponse
     */
    public function del(Role $role, Manager $manager) {
        $manager->removeRole($role);
        return response()->json(['code' => 200, 'data' => []]);
    }

    /**
     * @param RoleHasPermissionsRequest $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function bundlePermissions(RoleHasPermissionsRequest $request, Role $role) {
        $role->syncPermissions($request->permissions);
        flash()->success('权限添加成功');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}

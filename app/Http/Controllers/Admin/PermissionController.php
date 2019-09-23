<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PermissionRequest;
use App\Models\Manager;
use App\Repositories\Magic\PermissionMagic;
use App\Repositories\PermissionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/**
 * Class PermissionController
 * @package App\Http\Controllers\Admin
 */
class PermissionController extends Controller
{
    /**
     * @var PermissionRepository
     */
    private $repository;

    /**
     * PermissionController constructor.
     */
    public function __construct() {
        $this->middleware('auth:manager');

        view()->share('title', '权限管理');
        $this->repository = new PermissionRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        //
        $search['name'] = $search['title'] = $request->get('keywords');
        $list = $this->repository->magic(new PermissionMagic($search))->orderBy('id')->paginate(option('PAGE_SIZE'));
        return view('admin.permission.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request) {
        $data['title'] = $request->get('title');
        $data['name'] = $request->get('name');
        $data['guard_name'] = $request->get('guard_name');
        $data['group'] = $request->get('group');
        $this->repository->create($data);
        flash()->success('权限创建成功');
        return redirect(route('admin.permission.index'));
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
    public function edit(Permission $permission) {
        //
        return view('admin.permission.edit', compact('permission'));
    }

    /**
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function permissions(Request $request, Role $role) {
        $all = $this->repository->get()->groupBy('group');
        return view('admin.permission.permissions', compact('all', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, Permission $permission) {
        $this->repository->update($request->all(), $permission->id);
        flash()->success('权限编辑成功');
        return redirect(route('admin.permission.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        return response()->json(['code' => 200, 'data' => $this->repository->delete($id)]);

    }
}

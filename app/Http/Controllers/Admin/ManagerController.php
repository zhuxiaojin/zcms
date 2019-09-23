<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ManagerRequest;
use App\Models\Manager;
use App\Repositories\Magic\ManagerMagic;
use App\Repositories\ManagerRepository;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    protected $repository;

    public function __construct() {
        $this->middleware('auth:manager');
        view()->share('title', '权限管理');
        $this->repository = new ManagerRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        //
        $search['name'] = $search['email'] = $request->get('keywords');
        $list = $this->repository->magic(new ManagerMagic($search))->orderBy('id')->paginate(option('PAGE_SIZE'));
        return view('admin.manager.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view('admin.manager.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManagerRequest $request) {
        $data['name'] = $request->get('name');
        $data['email'] = $request->get('email');
        $data['password'] = bcrypt($request->get('password'));
        $this->repository->create($data, 'create');
        flash()->success('用户创建成功');
        return redirect(route('admin.manager.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ManagerController $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ManagerController $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager) {
        //

        return view('admin.manager.edit', compact('manager'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Manager $manager
     * @return \Illuminate\Http\Response
     */
    public function update(ManagerRequest $request, Manager $manager) {
        //
        $data['name'] = $request->get('name');
        $data['email'] = $request->get('email');
        if ($request->get('password')) {
            $data['password'] = bcrypt($request->get('password'));
        }
        $this->repository->update($data, $manager->id);
        flash()->success('用户编辑成功');
        return redirect(route('admin.manager.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manager $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager) {
        $manager->delete();
//        $this->authorize('destroy', $manager);

        return response()->json(['code' => 200]);
    }
}

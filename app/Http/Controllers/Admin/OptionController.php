<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\OptionRequest;
use App\Models\Option;
use App\Repositories\Magic\OptionMagic;
use App\Repositories\OptionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class OptionController 配置管理
 * @package App\Http\Controllers\Admin
 */
class OptionController extends Controller
{
    protected $repository;

    public function __construct() {
        $this->middleware('auth:manager');
        $this->repository = new OptionRepository();
        view()->share('title', '配置管理');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $search['key'] = $search['name'] = $request->get('keywords');
        $list = $this->repository->magic(new OptionMagic($search))->orderBy('id')->paginate(option('PAGE_SIZE'));
        return view('admin.option.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view('admin.option.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(OptionRequest $request) {
        //
        $this->repository->create($request->all());
        flash()->success('配置创建成功');
        return redirect(route('admin.option.index'));
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
    public function edit(Option $option) {
        return view('admin.option.edit', compact('option'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(OptionRequest $request, Option $option) {
        $this->repository->update($request->all(), $option->id);
        flash()->success('配置项已更新');
        return redirect(route('admin.option.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
        $this->repository->delete($id);
        return response()->json(['code' => 200]);
    }
}

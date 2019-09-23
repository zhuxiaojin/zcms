<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SiteRequest;
use App\Models\Site;
use App\Repositories\SiteRepository;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    protected $repository;

    public function __construct() {
        $this->middleware('auth:manager');

        $this->repository = new SiteRepository();
        view()->share('title', '网站设置');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $site = $this->repository->first();
        return view('admin.site.edit', compact('site'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
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
    public function edit(Site $site) {
        //
        $site = $this->repository->first();
        return view('admin.site.edit', compact('site'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SiteRequest $request, Site $site) {
        //
        $this->repository->update($request->all(), $site->id);
        flash()->success('网站信息保存成功');
        return redirect(route('admin.site.edit',$site));
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

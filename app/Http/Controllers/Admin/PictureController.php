<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PictureRequest;
use App\Models\Manager;
use App\Modles\Picture;
use App\Repositories\Magic\PictureMagic;
use App\Repositories\PictureRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Plank\Mediable\MediaUploader;

class PictureController extends Controller
{
    protected $repository;

    public function __construct() {
        view()->share('title', '相册管理');
        $this->repository = new PictureRepository();
    }

    /**
     * @param Request $request
     */
    public function index(Request $request) {
        //
        $search['title'] = $request->get('keywords');
        $list = $this->repository->with('media')->magic(new PictureMagic($search))->paginate(option('PAGE_SIZE'));
        return view('admin.picture.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view('admin.picture.create');
    }

    /**
     * @param PictureRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(PictureRequest $request) {
        $picture = $this->repository->create($request->all(), 'create');
        $picture->attachMedia($request->get('media'), 'pictures');
        flash()->success('相册创建成功');
        return redirect(route('admin.picture.index'));
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
    public function edit(Picture $picture) {
        //
        $medias = $picture->getMedia('pictures')->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = thumbnail($item);
            $item->name = $item->filename;
            $item->type = $item->mime_type;
        });
        return view('admin.picture.edit', compact('medias', 'picture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PictureRequest $request, Picture $picture) {
        $picture->syncMedia($request->get('media'), 'pictures');
        $this->repository->update($request->only(['title', 'body']), $picture->id);
        flash()->success('相册修改成功');
        return redirect(route('admin.picture.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->repository->delete($id);
        return response()->json(['code' => 200]);
    }
}

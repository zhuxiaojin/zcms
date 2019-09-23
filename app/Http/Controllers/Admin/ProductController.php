<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProductRequest;
use App\Models\Product;
use App\Providers\ParseDownServiceProvider;
use App\Repositories\Magic\ProductMagic;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    private $repository;

    public function __construct() {
        $this->repository = new ProductRepository();
        view()->share('title', '产品管理');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        //
        $search['name'] = $request->get('keywords');
        $list = $this->repository->with('media')->magic(new ProductMagic($search))->paginate(18);
        return view('admin.product.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request) {
        //
        $data['name'] = $request->get('name');
        $data['body'] = $request->get('editor-markdown-doc');
        $data['type'] = $request->get('editor-markdown-doc') ? 1 : 2;
        $product = $this->repository->create($data);
        $product->attachMedia($request->get('media'), 'pictures');
        flash()->success('产品创建成功！');
        return redirect(route('admin.product.index'));
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
    public function edit(Product $product) {
        //
        $medias = $product->getMedia('pictures')->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = thumbnail($item);
            $item->name = $item->filename;
            $item->type = $item->mime_type;
        });
        return view('admin.product.edit', compact('product', 'medias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product) {
        //
        $data['name'] = $request->get('name');
        $data['body'] = $request->get('editor-markdown-doc');
        $data['type'] = $request->get('editor-markdown-doc') ? 1 : 2;
        $product = $this->repository->update($data, $product->id);
        $product->syncMedia($request->get('media'), 'pictures');
        flash()->success('产品编辑成功！');
        return redirect(route('admin.product.index'));
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

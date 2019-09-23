<?php

namespace App\Http\Controllers\Admin;


use App\Events\ArticleEvent;
use App\Http\Requests\Admin\ArticleRequest;
use App\Models\Article;
use App\Models\Manager;
use App\Notifications\ArticleNotification;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ArticleController extends Controller
{
    private $repository;

    public function __construct(ArticleRepository $repository) {
        $this->middleware('auth:manager');
        view()->share('title', '文章管理');
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        $list = $this->repository->with('manager')->paginate(option('PAGE_SIZE'));
        return view('admin.article.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view('admin.article.create');
    }

    /**
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request) {
        //
        $data['title'] = $request->get('title');
        $data['body'] = $request->get('editor-markdown-doc');
        $data['manager_id'] = auth('manager')->id();
        $data['type'] = $request->get('editor-markdown-doc') ? 1 : 2;
        $this->repository->create($data);
        flash()->success('文章发布成功');
        return redirect(route('admin.article.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article $adminArticle
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article $adminArticle
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article) {
        //
        return view('admin.article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param \App\Models\Article $adminArticle
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id) {
        //
        $data['title'] = $request->get('title');
        $data['body'] = $request->get('editor-markdown-doc');
        $data['manager_id'] = auth('manager')->id();
        $data['type'] = $request->get('editor-markdown-doc') ? 1 : 2;
        $this->repository->update($data, $id);
        flash()->success('文章更新成功');
        return redirect(route('admin.article.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
        $this->repository->delete($id);
        return response()->json(['code' => 200]);
    }
}

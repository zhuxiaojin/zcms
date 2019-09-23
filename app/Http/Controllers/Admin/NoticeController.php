<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\NoticeRequest;
use App\Models\Notice;
use App\Repositories\Magic\NoticeMagic;
use App\Repositories\NoticeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoticeController extends Controller
{
    protected $repository;

    public function __construct() {
        $this->repository = new NoticeRepository();
        view()->share('title', '通知管理');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

//        $keywords = $request->get('keywords');
//        $list = Notice::latest()->when($keywords, function ($query) use ($keywords) {
//            $query->where('title', 'like', "%$keywords%")->orWhereHas('manager', function ($query) use ($keywords) {
//                $query->where('name','like',"%$keywords%");
//            });
//        })->paginate(10);
        $search['title'] = $search['manager_name'] = $request->get('keywords');
        $list = $this->repository->with('manager')->magic(new NoticeMagic($search))->orderBy('id')->paginate();
        return view('admin.notice.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view('admin.notice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoticeRequest $request) {
        //
        $data['title'] = $request->get('title');
        $data['body'] = $request->get('body');
        $data['manager_id'] = auth('manager')->id();
        Notice::create($data);
        flash()->success('通知创建成功');
        return redirect(route('admin.notice.index'));
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
    public function edit(Notice $notice) {
        //
        return view('admin.notice.edit', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(NoticeRequest $request, Notice $notice) {
        //
        $data['title'] = $request->get('title');
        $data['body'] = $request->get('body');
        $data['manager_id'] = auth('manager')->id();
        $notice->update($data);
        flash()->success('通知更新成功');
        return redirect(route('admin.notice.index'));
    }

    /**
     * @param Notice $notice
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Notice $notice) {
        $notice->delete();
        return response()->json(['code' => 200]);
    }
}

@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid white">
        <div class="row  ">
            <div class="col-md-12  ">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{route('admin.article.create')}}" class="btn btn-primary">新增</a>
                    </div>

                    <div class="col-md-6 ">
                        <form action="{{route('admin.article.index')}}" method="get" class="form-inline pull-right">
                            <input type="text" name="keywords" placeholder="标题/发布人" class="form-control">
                            <button type="submit" class="btn btn-primary ml-2">查询</button>
                        </form>
                    </div>
                </div>
                <table class="table mt-10">
                    <thead class="thead-light">
                    <tr >
                        <th>ID</th>
                        <th>标题</th>
                        <th>发布人</th>
                        <th>发布日期</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $article)
                        <tr >
                            <th scope="row">{{$article->id}}</th>
                            <td>{{$article->title}}</td>
                            <td><img src="{{$article->manager->avatar}}" alt="" class="rounded-circle mr-2" style="max-height: 32px;max-width: 32px">  {{$article->manager->name}}</td>
                            <td>{{$article->published_at}}</td>
                            <td>
                                <div class="row">
                                    <a href="{{route('admin.article.edit',$article)}}"
                                       class="btn btn-info btn-sm">编辑</a>
                                    <button type="button" class="btn btn-danger btn-sm ml-2"
                                            onclick="del_obj('{{route('admin.article.destroy',$article)}}','确定删除该文章吗')">
                                        删除
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{$list->links()}}
    </div>


@endsection
@push('javascript')

@endpush

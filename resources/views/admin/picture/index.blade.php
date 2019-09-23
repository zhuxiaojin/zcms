@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid white">
        <div class="row  ">
            <div class="col-md-12  ">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{route('admin.picture.create')}}" class="btn btn-primary">新增</a>
                    </div>

                    <div class="col-md-6 ">
                        <form action="{{route('admin.picture.index')}}" method="get" class="form-inline pull-right">
                            <input type="text" name="keywords" placeholder="相册标题" class="form-control">
                            <button type="submit" class="btn btn-primary ml-2">查询</button>
                        </form>
                    </div>
                </div>
                <table class="table mt-10">
                    <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>相册名称</th>
                        <th>内容</th>
                        <th>数量</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $picture)
                        <tr>
                            <th scope="row">{{$picture->id}}</th>
                            <td>{{$picture->title}}</td>
                            <td>{{$picture->body|title|limit:15}}</td>
                            <td>{{$picture->media()->count()}}</td>
                            <td>
                                <div class="row">
                                    <a href="{{route('admin.picture.edit',$picture)}}"
                                       class="btn btn-info btn-sm">编辑</a>
                                    <button type="button" class="btn btn-danger btn-sm ml-2"
                                            onclick="del_obj('{{route('admin.picture.destroy',$picture)}}','确定删除该相册吗')">
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

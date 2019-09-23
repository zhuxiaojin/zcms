@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid white">
        <div class="row  ">
            <div class="col-md-12  ">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{route('admin.menu.create')}}" class="btn btn-primary">新增</a>
                    </div>
                    <div class="col-md-6 ">
                        <form action="{{route('admin.menu.index')}}" method="get" class="form-inline pull-right">
                            <input type="text" name="keywords" placeholder="url/标题" class="form-control">
                            <button type="submit" class="btn btn-primary ml-2">查询</button>
                        </form>
                    </div>
                </div>
                <table class="table mt-10">
                    <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>标题</th>
                        <th>url</th>
                        <th>class</th>
                        <th>上级</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $menu)
                        <tr>
                            <th scope="row">{{$menu->id}}</th>
                            <td>{{$menu->title}}</td>
                            <td>{{$menu->url}}</td>
                            <td>{{$menu->class}}</td>
                            <td>{{$menu->parent?$menu->parent->title:''}}</td>
                            <td>
                                <div class="row">
                                    <a href="{{route('admin.menu.edit',$menu)}}"
                                       class="btn btn-info btn-sm">编辑</a>
                                    <button type="button" class="btn btn-danger btn-sm ml-2"
                                            onclick="del_obj('{{route('admin.menu.destroy',$menu)}}','确定删除该菜单吗')">
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

@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid white">
        <div class="row  ">
            <div class="col-md-12  ">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{route('admin.permission.create')}}" class="btn btn-primary">新增</a>
                    </div>
                    <div class="col-md-6 ">
                        <form action="{{route('admin.permission.index')}}" method="get" class="form-inline pull-right">
                            <input type="text" name="keywords" placeholder="标题/链接" class="form-control">
                            <button  type="submit" class="btn btn-primary ml-2">查询</button>
                        </form>
                    </div>
                </div>
                <table class="table mt-10">
                    <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>标题</th>
                        <th>链接</th>
                        <th>分组</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $permission)
                        <tr>
                            <th scope="row">{{$permission->id}}</th>
                            <td>{{$permission->title}}</td>
                            <td>{{$permission->name}}</td>
                            <td>{{$permission->group}}</td>
                            <td>{{$permission->created_at}}</td>
                            <td>
                                <div class="row">
                                    <a href="{{route('admin.permission.edit',$permission)}}"
                                       class="btn btn-info btn-sm">编辑</a>
                                    <button type="button" class="btn btn-danger btn-sm ml-2"
                                            onclick="del_obj('{{route('admin.permission.destroy',$permission)}}','确定删除该权限吗')">
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

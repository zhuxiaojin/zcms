@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid white">
        <div class="row  ">
            <div class="col-md-12  ">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{route('admin.role.create')}}" class="btn btn-primary">新增</a>
                    </div>
                    <div class="col-md-6 ">
                        <form action="{{route('admin.role.index')}}" method="get" class="form-inline pull-right">
                            <input type="text" name="keywords" placeholder="调用名称/组名" class="form-control" value="{{old('keywords')}}">
                            <button type="submit" class="btn btn-primary ml-2">查询</button>
                        </form>
                    </div>
                </div>
                <table class="table mt-10">
                    <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>调用名称</th>
                        <th>组名</th>
                        <th>列表</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $role)
                        <tr>
                            <th scope="row">{{$role->id}}</th>
                            <td>{{$role->name}}</td>
                            <td>{{$role->title}}</td>
                            <td><a href="{{route('admin.role.members',$role)}}" class="btn btn-outline-custom">人员列表</a><a
                                    href="{{route('admin.permission.permissions',$role)}}" class="btn btn-outline-info ml-2">授权列表</a>
                            </td>
                            <td>{{$role->created_at}}</td>
                            <td>
                                <div class="row">
                                    <a href="{{route('admin.role.edit',$role)}}"
                                       class="btn btn-info btn-sm">编辑</a>
                                    <button type="button" class="btn btn-danger btn-sm ml-2"
                                            onclick="del_obj('{{route('admin.role.destroy',$role)}}','确定删除该权限组吗')">
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

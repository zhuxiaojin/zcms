@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid white">
        <div class="row  ">
            <div class="col-md-12  ">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{route('admin.manager.create')}}" class="btn btn-primary">新增</a>
                    </div>
                    <div class="col-md-6 ">
                        <form action="{{route('admin.manager.index')}}" method="get" class="form-inline pull-right">
                            <input type="text" name="keywords" placeholder="用户名/邮箱" class="form-control">
                            <button href="{{route('admin.manager.create')}}" class="btn btn-primary ml-2">查询</button>
                        </form>
                    </div>
                </div>
                <table class="table mt-10">
                    <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>头像</th>
                        <th>用户名</th>
                        <th>邮箱</th>
                        <th>注册时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $manager)
                        <tr>
                            <th scope="row">{{$manager->id}}</th>
                            <td><img class="avatar" src="{{$manager->avatar}}" alt=""></td>
                            <td>{{$manager->name}}</td>
                            <td>{{$manager->email}}</td>
                            <td>{{$manager->created_at}}</td>
                            <td>
                                <div class="row">
                                    <a href="{{route('admin.manager.edit',$manager)}}"
                                       class="btn btn-info btn-sm">编辑</a>
                                    @if($manager->id !==1)
                                        <button type="button" class="btn btn-danger btn-sm ml-2"
                                                onclick="del_obj('{{route('admin.manager.destroy',$manager)}}','确定删除该用户吗')">
                                            删除
                                        </button>
                                    @endif
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

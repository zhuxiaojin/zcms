@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid white">
        <div class="row  ">
            <div class="col-md-12  ">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{route('admin.option.create')}}" class="btn btn-primary">新增</a>
                    </div>

                    <div class="col-md-6 ">
                        <form action="{{route('admin.option.index')}}" method="get" class="form-inline pull-right">
                            <input type="text" name="keywords" placeholder="KEY/名称" class="form-control">
                            <button type="submit" class="btn btn-primary ml-2">查询</button>
                        </form>
                    </div>
                </div>
                <p class="text-muted m-b-15 font-13 mt-2">
                    使用 <code>option($name)</code>获取.
                </p>
                <table class="table mt-10">
                    <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>名称</th>
                        <th>KEY</th>
                        <th>value</th>
                        <th>描述</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $option)
                        <tr>
                            <th scope="row">{{$option->id}}</th>
                            <td>{{$option->name}}</td>
                            <td>{{$option->key}}</td>
                            <td>{{$option->value}}</td>
                            <td>{{$option->description|title|limit:15}}</td>
                            <td>
                                <div class="row">
                                    <a href="{{route('admin.option.edit',$option)}}"
                                       class="btn btn-info btn-sm">编辑</a>
                                    <button type="button" class="btn btn-danger btn-sm ml-2"
                                            onclick="del_obj('{{route('admin.option.destroy',$option)}}','确定删除该配置吗')">
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

@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid white">
        <div class="row">
            <div class="col-md-12">
                @include('plugins.alert',['status'=>'danger'])
            </div>
        </div>
        <div class="row  " style="min-height:400px;">
            <div class="col-md-12  ">
                <form action="{{route('admin.role.permissions',$role)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row ml-lg- ml-lg-md card-box">
                        @foreach($all as $k=>$permission)
                            <div class="col-lg-4 col-md-6 m-t-50">
                                <h4 class="m-t-0 header-title"><b>{{empty($k)?'其他':$k}}</b></h4>
                                <p class="text-muted font-14 m-b-10">
                                    <small>以下为{{empty($k)?'其他':$k}}的权限列表</small>
                                </p>
                                @foreach ($permission as $value)
                                    <div class="checkbox checkbox-custom">
                                        <input id="permission_id_{{$value->id}}" name='permissions[]'
                                               value="{{$value->id}}"
                                               {{ $role->permissions()->count()?$role->hasPermissionTo($value)?'checked':'':0}}
                                               type="checkbox" style="padding-top:2px;">
                                        <label for="permission_id_{{$value->id}}">
                                            {{$value->title}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group text-right"
                                 style="position:fixed;right:80px;top:300px;z-index: 99999">
                                <button class="btn btn-primary top-left" style="">保存
                                </button>
                                <p class="text-center text-muted">
                                    <small>保存在这里</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@push('javascript')
@include('plugins.menu-high',['route'=>route('admin.role.index')])
@endpush

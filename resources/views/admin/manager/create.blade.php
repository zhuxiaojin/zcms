@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid white">
        <div class="row">
            <div class="col-md-8">
                @include('plugins.alert',['status'=>'danger'])
            </div>
        </div>
        <div class="row  ">
            <div class="col-md-8  ">
                {!! Form::open(['route'=>'admin.manager.store','method'=>'post','files'=>true,'class'=>'form-horizontal','role'=>'form']) !!}
                <div class="form-group row">
                    {{Form::label('name',important('用户名'),['class'=>'col-2 col-form-label'],false)}}
                    <div class="col-10">
                        {{Form::text('name',old('name'),['class'=>'form-control'])}}
                    </div>
                </div>
                <div class="form-group row">
                    {{Form::label('email',important('邮箱'),['class'=>'col-2 col-form-label'],false)}}
                    <div class="col-10">
                        {{Form::email('email',old('email'),['class'=>'form-control'])}}
                    </div>
                </div>
                <div class="form-group row">
                    {{Form::label('password',important('密码'),['class'=>'col-2 col-form-label'],false)}}
                    <div class="col-10">
                        {{Form::password('password',['class'=>'form-control'])}}
                    </div>
                </div>
                <div class="form-group row">
                    {{Form::label('confirm_password',important('确认密码'),['class'=>'col-2 col-form-label'],false)}}
                    <div class="col-10">
                        {{Form::password('password_confirmation',['class'=>'form-control'])}}
                    </div>
                </div>
                @if(auth('manager')->user()->hasRole('super-admin'))
                    <div class="form-group row">
                        {{Form::label('confirm_password','权限组',['class'=>'col-2 col-form-label'])}}
                        <div class="col-10">
                            @foreach($roles as $role)
                                <div class="checkbox checkbox-primary">
                                    {{Form::checkbox('roles[]',$role->id,'',['id'=>'checkbox'.$loop->index])}}
                                    <label for="checkbox{{$loop->index}}">
                                        {{$role->title}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="form-group row">
                    <div class="col-10 offset-2">
                        <button type="submit" class="btn btn-success">确认</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('javascript')
    @include('plugins.menu-high',['route'=>route('admin.manager.index')])
@endpush

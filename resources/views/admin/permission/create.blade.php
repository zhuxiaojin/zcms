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
                {!! Form::open(['route'=>'admin.permission.store','method'=>'post','files'=>true,'class'=>'form-horizontal','role'=>'form']) !!}
                <div class="form-group row">
                    {{Form::label('title',important('标题'),['class'=>'col-2 col-form-label'],false)}}
                    <div class="col-10">
                        {{Form::text('title',old('title'),['class'=>'form-control','required'])}}
                    </div>
                </div>
                <input type="hidden" name="guard_name" value="manager">
                <div class="form-group row">
                    {{Form::label('name',important('链接'),['class'=>'col-2 col-form-label'],false)}}
                    <div class="col-10">
                        {{Form::text('name',old('name'),['class'=>'form-control','required'])}}
                    </div>
                </div>
                <div class="form-group row">
                    {{Form::label('group','分组',['class'=>'col-2 col-form-label'])}}
                    <div class="col-10">
                        {{Form::text('group',old('group'),['class'=>'form-control'])}}
                    </div>
                </div>
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
    @include('plugins.menu-high',['route'=>route('admin.permission.index')])
@endpush

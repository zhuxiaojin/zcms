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
                {!! Form::model($option,['route'=>['admin.option.update',$option],'method'=>'put','files'=>true,'class'=>'form-horizontal','role'=>'form']) !!}
                <div class="form-group row">
                    {{Form::label('key',important('KEY'),['class'=>'col-2 col-form-label'],false)}}
                    <div class="col-10">
                        {{Form::text('key',old('key'),['class'=>'form-control'])}}
                    </div>
                </div>
                <div class="form-group row">
                    {{Form::label('value',important('Value'),['class'=>'col-2 col-form-label'],false)}}
                    <div class="col-10">
                        {{Form::text('value',old('value'),['class'=>'form-control'])}}
                    </div>
                </div>
                <div class="form-group row">
                    {{Form::label('name',important('名称'),['class'=>'col-2 col-form-label'],false)}}
                    <div class="col-10">
                        {{Form::text('name',old('name'),['class'=>'form-control'])}}
                    </div>
                </div>
                <div class="form-group row">
                    {{Form::label('description','描述',['class'=>'col-2 col-form-label'])}}
                    <div class="col-10">
                        {{Form::textarea('description',old('description'),['class'=>'form-control'])}}
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
    @include('plugins.menu-high',['route'=>route('admin.option.index')])
@endpush

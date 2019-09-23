@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid white">
        <div class="row">
            <div class="col-md-12">
                @include('plugins.alert',['status'=>'danger'])
            </div>
        </div>
        <div class="row  ">
            <div class="col-md-12  ">
                {!! Form::model($article,['route'=>['admin.article.update',$article],'method'=>'put','files'=>true,'class'=>'form-horizontal','role'=>'form']) !!}
                <div class="form-group row">
                    <div class="col-12">
                        {{Form::text('title',old('title'),['class'=>'form-control','placeholder'=>'标题'])}}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12 " style="height: 750px;z-index: 11">
                        <div id="editor" >
                        </div>
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
    @include('plugins.menu-high',['route'=>route('admin.article.index')])
    @include('plugins.editor_md',['body'=>old('editor-markdown-doc',$article->body)])

@endpush

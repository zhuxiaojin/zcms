@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid white">
        <div class="row">
            <div class="col-md-11">
                @include('plugins.alert',['status'=>'danger'])
            </div>
        </div>
        <div class="row  ">
            <div class="col-md-12  ">
                {!! Form::open(['route'=>'admin.product.store','method'=>'post','files'=>true,'class'=>'form-horizontal','role'=>'form']) !!}
                <div class="form-group row">
                    {{Form::label('name',important('产品名称'),['class'=>'col-2 col-form-label'],false)}}
                    <div class="col-11">
                        {{Form::text('name',old('name'),['class'=>'form-control','placeholder'=>''])}}
                    </div>
                </div>
                <div class="form-group row">
                    {{Form::label('body',important('产品图集'),['class'=>'col-2 col-form-label'],false)}}
                    <div class=" dropzone dz-clickable ml-3" id="dropzone"  style="width: 89%" >
                        <div class="dz-default dz-message"><span>将文件拖至此处或点击上传</span></div>
                    </div>
                </div>
                <div class="form-group row">
                    {{Form::label('name',important('产品内容'),['class'=>'col-2 col-form-label'],false)}}
                    <div class="col-11 " style="height: 750px;z-index: 11">
                        <div id="editor">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-10 offset-1">
                        <button type="submit" class="btn btn-success">确认</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">图片预览</h4>
                </div>
                <div class="modal-body text-center">
                    <img src="" alt="" style="max-height: 70%;max-width: 70%">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">关闭</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@push('javascript')
    @include('plugins.menu-high',['route'=>route('admin.product.index')])
    @include('plugins.editor_md',['body'=>old('editor-markdown-doc','')])
    @include('plugins.many-upload')
@endpush

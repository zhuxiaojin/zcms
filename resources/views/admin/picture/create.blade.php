@extends('layouts.admin.app')
@push('css')
    <!-- Custom box css -->
    <link href="{{asset('plugins/custombox/css/custombox.min.css')}}" rel="stylesheet">

@endpush
@section('content')
    <div class="container-fluid white">
        <div class="row">
            <div class="col-md-8">
                @include('plugins.alert',['status'=>'danger'])
            </div>
        </div>
        <div class="row  ">
            <div class="col-md-8  ">
                {!! Form::open(['route'=>'admin.picture.store','method'=>'post','files'=>true,'class'=>'form-horizontal','role'=>'form']) !!}
                <div class="form-group row">
                    {{Form::label('title',important('标题'),['class'=>'col-2 col-form-label'],false)}}
                    <div class="col-10">
                        {{Form::text('title',old('title'),['class'=>'form-control'])}}
                    </div>
                </div>
                <div class="form-group row">
                    {{Form::label('body',important('上传文件'),['class'=>'col-2 col-form-label'],false)}}
                    <div class="dropzone dz-clickable ml-3" id="dropzone" style="width: 79%;">
                        <div class="dz-default dz-message"><span>将文件拖至此处或点击上传</span></div>
                    </div>
                </div>
                <div class="form-group row">
                    {{Form::label('body', ('相册描述'),['class'=>'col-2 col-form-label'],false)}}
                    <div class="col-10">
                        {{Form::textarea('body',old('body'),['class'=>'form-control','rows'=>'3'])}}
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

    <!-- Modal-Effect -->
    <script src="{{asset('plugins/custombox/js/custombox.min.js')}}"></script>
    <script src="{{asset('plugins/custombox/js/legacy.min.js')}}"></script>

    @include('plugins.menu-high',['route'=>route('admin.notice.index')])
    @include('plugins.many-upload')
@endpush

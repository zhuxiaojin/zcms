@extends('layouts.admin.app')
@push('css')
    <!-- Bootstrap fileupload css -->
    <link href="{{asset('plugins/bootstrap-fileupload/bootstrap-fileupload.css')}}" rel="stylesheet"/>
@endpush
@section('content')
    <div class="container-fluid white">
        <div class="row">
            <div class="col-md-8">
                @include('plugins.alert',['status'=>'danger'])
            </div>
        </div>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="#home" data-toggle="tab" aria-expanded="false" class="nav-link active show">
                    <i class="fi-cog mr-2"></i> 基本设置
                </a>
            </li>
            <li class="nav-item">
                <a href="#profile" data-toggle="tab" aria-expanded="true" class="nav-link">
                    <i class="fi-monitor mr-2"></i>其他
                </a>
            </li>
            {{--<li class="nav-item">--}}
            {{--<a href="#messages" data-toggle="tab" aria-expanded="false" class="nav-link">--}}
            {{--<i class="fi-mail mr-2"></i> Messages--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
            {{--<a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">--}}
            {{--<i class="fi-cog mr-2"></i> Settings--}}
            {{--</a>--}}
            {{--</li>--}}
        </ul>

        <div class="tab-content">
            <div class="tab-pane active show" id="home">
                <div class="col-md-8  ">
                    {!! Form::model($site,['route'=>['admin.site.update',$site],'method'=>'put','files'=>true,'class'=>'form-horizontal','role'=>'form']) !!}
                    <div class="form-group row">
                        {{Form::label('url','域名',['class'=>'col-2 col-form-label'])}}
                        <div class="col-10">
                            {{Form::text('url',old('url'),['class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('title','网站标题',['class'=>'col-2 col-form-label'])}}
                        <div class="col-10">
                            {{Form::text('title',old('title'),['class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('keywords','关键字',['class'=>'col-2 col-form-label'])}}
                        <div class="col-10">
                            {{Form::text('keywords',old('keywords'),['class'=>'form-control'])}}
                        </div>
                    </div>
                    {{--<div class="form-group row">--}}
                        {{--{{Form::label('ico','图标(ico文件)',['class'=>'col-2 col-form-label'])}}--}}
                        {{--<div class="col-10">--}}
                            {{--<div class="fileupload fileupload-new" data-provides="fileupload">--}}
                                {{--<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">--}}
                                    {{--<img src="{{asset('images/small/img-1.jpg')}}" alt="image">--}}
                                {{--</div>--}}
                                {{--<div class="fileupload-preview fileupload-exists thumbnail"--}}
                                     {{--style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>--}}
                                {{--<div>--}}
                                    {{--<button type="button" class="btn btn-custom btn-file">--}}
                                        {{--<span class="fileupload-new"><i--}}
                                                {{--class="fa fa-paper-clip"></i> 选择文件</span>--}}
                                        {{--<span class="fileupload-exists"><i class="fa fa-undo"></i> 换一个</span>--}}
                                        {{--<input type="file" class="btn-light" name="ico">--}}
                                    {{--</button>--}}
                                    {{--<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i--}}
                                            {{--class="fa fa-trash"></i> 删除</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="form-group row">
                        {{Form::label('description','描述',['class'=>'col-2 col-form-label'])}}
                        <div class="col-10">
                            {{Form::textarea('description',old('description'),['class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group row">
                        {{Form::label('num','备案号',['class'=>'col-2 col-form-label'])}}
                        <div class="col-10">
                            {{Form::text('num',old('num'),['class'=>'form-control'])}}
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
            <div class="tab-pane active show" id="profile"></div>
            <div class="tab-pane active show" id="messages"></div>
            <div class="tab-pane active show" id="setting"></div>
        </div>
    </div>
@endsection
@push('javascript')
    <!-- Bootstrap fileupload js -->
    <script src="{{asset('plugins/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
@endpush

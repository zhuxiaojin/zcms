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
                {!! Form::open(['route'=>'admin.menu.store','method'=>'post','files'=>true,'class'=>'form-horizontal','role'=>'form']) !!}
                <div class="form-group row">
                    {{Form::label('title',important('标题'),['class'=>'col-2 col-form-label'],false)}}
                    <div class="col-10">
                        {{Form::text('title',old('title'),['class'=>'form-control'])}}
                    </div>
                </div>
                <div class="form-group row">
                    {{Form::label('url', 'Url' ,['class'=>'col-2 col-form-label'],false)}}
                    <div class="col-10">
                        {{Form::text('url',old('url'),['class'=>'form-control'])}}
                    </div>
                </div>
                <div class="form-group row">
                    {{Form::label('parent_id','上级菜单',['class'=>'col-2 col-form-label'])}}
                    <div class="col-10">
                        {{Form::select('parent_id',$menus,0,['class'=>'form-control','onchange'=>'change(this)'])}}
                    </div>
                </div>
                <div class="form-group row">
                    {{Form::label('order','排序',['class'=>'col-2 col-form-label'])}}
                    <div class="col-10">
                        {{Form::number('order',0,['class'=>'form-control'])}}
                    </div>
                </div>
                <div class="form-group row" id="class">
                    {{Form::label('class','样式',['class'=>'col-2 col-form-label'])}}
                    <div class="col-10">
                        {{Form::text('class',old('class'),['class'=>'form-control'])}}
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
    <script type="text/javascript">
        function change(obj) {
            if ($(obj).val() != 0) {
                $("form").find("#class").hide()
            } else {
                $("form").find("#class").show()
            }
        }
    </script>
@endpush
@push('javascript')
    @include('plugins.menu-high',['route'=>route('admin.menu.index')])
@endpush

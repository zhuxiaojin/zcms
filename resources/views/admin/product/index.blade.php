@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid white">
        <div class="row  ">
            <div class="col-md-12  ">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{route('admin.product.create')}}" class="btn btn-primary">新增</a>
                    </div>

                    <div class="col-md-6 ">
                        <form action="{{route('admin.product.index')}}" method="get" class="form-inline pull-right">
                            <input type="text" name="keywords" placeholder="产品名称" class="form-control">
                            <button type="submit" class="btn btn-primary ml-2">查询</button>
                        </form>
                    </div>
                </div>
                <div class="row mt-5">
                    @foreach($list as $product)
                        <div class="col-md-6 col-lg-2">
                            <div class="card m-b-30">
                                <div style="height: 200px;">
                                    <a href="{{route('admin.product.edit',$product)}}"> <img
                                            class="card-img-top img-thumbnail img-fluid" src="{{$product->cover}}"
                                            alt="Card image cap" style="max-width: 75%"></a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->name|title|limit:20}}</h5>
                                    <p class="card-text"
                                       style="max-height:150px;">{{$product->body|title|limit:50}}</p>
                                    <p class="card-text">
                                        <small class="text-muted">{{$product->updated_at}}</small>
                                    </p>
                                    <a href="{{route('admin.product.edit',$product)}}"
                                       class="btn btn-primary waves-effect waves-light">编辑</a>
                                    <button onclick="del_obj('{{route('admin.product.destroy',$product)}}','确定删除该产品吗')"
                                        class="btn btn-danger waves-effect waves-light">删除
                                    </button>
                                </div>

                            </div>
                        </div><!-- end col -->
                    @endforeach
                </div>
            </div>
        </div>
        {{$list->links()}}
    </div>


@endsection
@push('javascript')

@endpush

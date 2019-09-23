@if($errors->all())
    <div class="alert alert-{{$status}} alert-dismissible bg-{{$status}} text-white border-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        {{$errors->first()}}
    </div>
@endif

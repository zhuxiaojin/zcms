<!-- 多文件上传 js处理-->
<!-- Bootstrap fileupload css -->
<link href="{{asset('plugins/bootstrap-fileupload/bootstrap-fileupload.css')}}" rel="stylesheet"/>
<!-- Dropzone css -->
<link href="{{asset('plugins/dropzone/dropzone.css')}}" rel="stylesheet" type="text/css"/>

<style>

    .dropzone .dz-preview .dz-image img {
        max-width: 200px;
        max-height: 200px
    }

    .dropzone .dz-preview:not(.dz-processing) .dz-progress {
        display: none;
    }
</style>
<script src="{{asset('plugins/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
<script src="{{asset('plugins/dropzone/dropzone.js')}}"></script>
<script>
    Dropzone.autoDiscover = false;
    var uploadedDocumentMap = {};
    var myDropzone = new Dropzone("#dropzone", {
        url: "{{route('admin.upload')}}", // 文件提交地址
        method: "post",  // 也可用put
        paramName: "file", // 默认为file
        maxFiles: 20,// 一次性上传的文件数量上限
        maxFilesize: 15, // 文件大小，单位：MB
        acceptedFiles: ".jpg,.gif,.png,.jpeg", // 上传的类型
        addRemoveLinks: true,
        parallelUploads: 1,// 一次上传的文件数量
        uploadMultiple: false,
        maxThumbnailFilesize: 20,
        //previewsContainer:"#preview", // 上传图片的预览窗口
        dictDefaultMessage: '拖动文件至此或者点击上传',
        dictMaxFilesExceeded: "您最多只能上传5个文件！",
        dictResponseError: '文件上传失败!',
        dictInvalidFileType: "文件类型只能是*.jpg,*.gif,*.png,*.jpeg。",
        dictFallbackMessage: "浏览器不受支持",
        dictFileTooBig: "文件过大上传文件最大支持15M.",
        dictCancelUploadConfirmation: '确定删除该文件吗',
        dictRemoveFile: "删除",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        dictCancelUpload: "取消",
        init: function () {
                @if(isset($obj) )
            var files =
            {!! json_encode($obj) !!}
                for (var i in files) {
                var file = files[i];
                file.accepted = true;
                console.log(file)
                this.options.addedfile.call(this, file)
                this.createThumbnailFromUrl(file, file.url);//添加数据源给mock图片
                this.files.push(file);
                console.log(this.getAcceptedFiles().length);
                (function (_file) {
                    file.previewElement.addEventListener("click", function () {
                        $('#myModal').find('img').attr('src', _file.url);
                        $('#myModal').modal('show');
                    });
                })(file);
                $('form').append('<input type="hidden" name="media[]" value="' + file.id + '">')
            }
            @endif
                this.on("success", function (file, response) {
                // 上传成功触发的事件
                console.log(response)
                file.id = response.id
                // $('form').append('<input type="hidden" name="media[]" value="' + (file) + '">');
                file.previewElement.addEventListener("click", function () {
                    $('#myModal').find('img').attr('src', response.url);
                    $('#myModal').modal('show');
                });
                $('form').append('<input type="hidden" name="media[]" value=' + response.id + ' >');

            });

            this.on("removedfile", function (file, xhr) {
                console.log(this.getAcceptedFiles().length);
                $("input[name='media[]'][value="+file.id+"]").remove();
                // $('input[]<input type="hidden" name="media[]" value=' + file.id + ' >').remove();
                // 删除文件时触发的方法
                {{--var url = "{{route('admin.delete_media',":id")}}";--}}
                {{--url = url.replace(':id', file.id);--}}
                {{--$.ajax({--}}
                    {{--url: url,--}}
                    {{--type: 'delete',--}}
                    {{--data:--}}
                        {{--{'_token': "{{csrf_token()}}"},--}}
                    {{--success: function (result) {--}}
                    {{--}--}}
                {{--})--}}
            });


        },
    });
</script>
<!-- Dropzone js -->



<script src="{{asset('plugins/sweet-alert/sweetalert2.min.js')}}"></script>
<script type="text/javascript">
    //删除某个数据
    function del_obj(url, words) {
        swal({
            title: words,
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-confirm mt-2',
            cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
            confirmButtonText: '删除',
            cancelButtonText: '取消'
        }).then(function () {
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {'_token': "{{csrf_token()}}"},
                success: function (result) {
                    console.log(result);
                    if (result.code == 200) {
                        swal({
                                title: '删除成功 !',
                                type: 'success',
                                button: true,
                                confirmButtonClass: 'btn btn-confirm mt-2'
                            }
                        ).then(function () {
                            window.location.reload()
                        })
                    }
                },error(result){
                    if (result.status == 403) {
                        swal({
                                title: '无权操作 !',
                                type: 'error',
                                button: true,
                                confirmButtonClass: 'btn btn-confirm mt-2'
                            }
                        ).then(function () {
                            window.location.reload()
                        })
                    }
                }
            });

        }, function () {

        })

    }

    //更新某个数据
    function edit_obj(url, words) {
        swal({
            title: words,
            type: 'question',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-confirm mt-2',
            cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
            confirmButtonText: '确定',
            cancelButtonText: '取消'
        }).then(function () {
            $.ajax({
                url: url,
                type: 'put',
                data: {'_token': "{{csrf_token()}}"},
                success: function (result) {
                    if (result.status == true) {
                        swal({
                                title: result.msg ? result.msg : '修改成功 !',
                                type: 'success',
                                button: true,
                                confirmButtonClass: 'btn btn-confirm mt-2'
                            }
                        ).then(function () {
                            window.location.reload()
                        })
                    }
                }
            });

        }, function () {

        })

    }
</script>

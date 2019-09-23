<!-- Toastr js -->
<script src="{{asset('plugins/jquery-toastr/jquery.toast.min.js')}}" type="text/javascript"></script>
@if(flash()->message)
    <script type="text/javascript">
        @switch(flash()->class)
        @case('success')
        $.toast({
            heading: "{{flash()->message}}",
            text: '操作已执行成功',
            showHideTransition: 'slide',
            position: 'top-right',
            loaderBg: '#5ba035',
            icon: 'success',
            hideAfter: 3000,
            stack: 1,
            width:500
        });
        @break
        @case('info')
        $.toast({
            heading: '{{flash()->message}}',
            text: "友情提示",
            showHideTransition: 'plain',
            position: 'top-right',
            loaderBg: '#3b98b5',
            icon: "{{flash()->class}}",
            hideAfter: 3000,
            stack: 1
        });
        @break
        @case('error')
        $.toast({
            heading: '{{flash()->message}}',
            text: "操作失败",
            showHideTransition: 'slide',
            position: 'top-right',
            loaderBg: '#da8609',
            icon: "{{flash()->class}}",
            hideAfter: 3000,
            stack: 1
        });
        @break
        @case('warning')
        $.toast({
            text: "请按照规范操作",
            heading: '{{flash()->message}}',
            showHideTransition: 'plain',
            position: 'top-right',
            loaderBg: '#da8609',
            icon: "{{flash()->class}}",
            hideAfter: 3000,
            stack: 1
        });
        @break
        @endswitch
    </script>
@endif

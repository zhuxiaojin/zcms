<link rel="stylesheet" href="{{asset('editormd/css/editormd.css')}}"/>
<script src="{{asset('editormd/editormd.js')}}"></script>
<script type="text/javascript">
    $(function () {
        var string = '';
            @isset($body)
        var string = @json($body);
            @endisset
        var editor = editormd("editor", {
                width: "100%",
                height: 740,
                theme: 'dark',
                // previewTheme : "dark",
                flowChart: true,
                imageUpload: true,
                saveHTMLToTextarea: true,
                imageFormats: ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
                imageUploadURL: "{{route('admin.upload_editor')}}",
                lineNumbers:false,
                // editorTheme : "pastel-on-dark",
                path: "{{asset('editormd/lib')}}/",
                onload: function () {
                    editor.setMarkdown(string)
                }
            });
    });
</script>

<!-- 导航高亮控制-->
<script type="text/javascript">
    var url = "{{$route}}";
    var element = $('ul li a').filter(function () {
        return this.href == url  ;
    }).addClass('active').parent().addClass('active').parent().addClass('in show').parent();
    if (element.is('li')) {
        element.children().first().addClass('active')
        element.addClass('active');
    }
</script>

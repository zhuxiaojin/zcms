<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$site->title}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="keywords" content="{{$site->keywords}}">
    <meta name="description" content="{{$site->description}}">
    @stack('css')
    <link href="{{asset('plugins/sweet-alert/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Toastr css -->
    <link href="{{asset('plugins/jquery-toastr/jquery.toast.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <!-- App css -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{mix('css/icons.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/metismenu.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{mix('css/site.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{mix('css/style_dark.css')}}" rel="stylesheet" type="text/css"/>
    {{--<link href="{{asset('plugins/sweet-alert/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>--}}
    <!-- Toastr css -->
    <script src="{{asset('js/modernizr.min.js')}}"></script>
</head>


<body>

<!-- Begin page -->
<div id="wrapper">
@include('layouts.admin.menu')
<!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">

        <!-- Top Bar Start -->
    @include('layouts.admin.top')
    <!-- Top Bar End -->


        <!-- Start Page content -->
        <div class="content">
            @yield('content')

        </div> <!-- content -->

        <footer class="footer text-right">
            © {{$site->num}}. - {{$site->url}}
        </footer>
    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->
<!-- jQuery  -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/metisMenu.min.js')}}"></script>
<script src="{{asset('js/waves.js')}}"></script>
<script src="{{asset('js/jquery.slimscroll.js')}}"></script>
<script type="text/javascript">
</script>
@stack('javascript')
@include('plugins.sweet')
@include('plugins.notification')
<!-- App js -->
<script src="{{asset('js/jquery.core.js')}}"></script>
<script src="{{asset('js/jquery.app.js')}}"></script>
<script src="{{asset('js/echo.js')}}"></script>
<script src="{{asset('js/socket.js')}}"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $site->title}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <!-- App css -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/icons.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/metismenu.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/style_dark.css')}}" rel="stylesheet" type="text/css"/>
    <script src="{{asset('js/modernizr.min.js')}}"></script>
</head>
<body class="account-pages">
<!-- Begin page -->
<div class="accountbg" style="background: url('{{asset('images/bg-3.jpg')}}');background-size: cover;"></div>
<div class="wrapper-page account-page-full">
    <div class="card">
        <div class="card-block">
            <div class="account-box">
                <div class="card-box p-5">
                    <h2 class="text-uppercase text-center pb-4">
                        <a href="index.html" class="text-success">
                            <span><img src="{{asset('images/logo_black.png')}}" alt="" height="26"></span>
                        </a>
                    </h2>
                    <form class="" action="{{route('admin.login')}}" method="POST">
                        @csrf
                        <div class="form-group m-b-20 row">
                            <div class="col-12">
                                <label for="email">邮箱</label>
                                <input class="form-control {{$errors->has('email')?'is-invalid':''}}" type="email"
                                       id="email" required="" name="email"
                                       placeholder="Enter your email">
                                @include('plugins.input-invalid', ['field' => 'email'])
                            </div>
                        </div>
                        <div class="form-group row m-b-20">
                            <div class="col-12">
                                <label for="password">密码</label>
                                <input class="form-control {{$errors->has('password')?'is-invalid':''}} "
                                       type="password" required="" id="password" name="password"
                                       placeholder="Enter your password">
                                @include('plugins.input-invalid', ['field' => 'password'])

                            </div>
                        </div>
                        <div class="form-group m-b-20 row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="email">验证码</label>
                                        <input class="form-control {{$errors->has('captcha')?'is-invalid':''}} "
                                               type="text"
                                               required="" name="captcha" value="{{old('captcha')}}"
                                               placeholder="验证码">
                                        @include('plugins.input-invalid', ['field' => 'captcha'])
                                    </div>
                                    <div class="col-6" style="padding-top:30px;">
                                        <img src="{{captcha_src()}}"
                                             style="cursor: pointer;border: solid #07b3bf 1px;border-radius∑:1px;"
                                             onclick="this.src='{{captcha_src()}}'+Math.random()">
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="form-group row m-b-20">
                            <div class="col-12">
                                <div class="checkbox checkbox-custom">
                                    <input id="remember" type="checkbox" checked="" name="remember">
                                    <label for="remember">
                                        记住我
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="form-group row text-center m-t-10">
                            <div class="col-12">
                                <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">登录
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="m-t-40 text-center">
        <p class="account-copyright">          © {{$site->num}}. - {{$site->url}}</p>
    </div>
</div>
<!-- jQuery  -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/metisMenu.min.js')}}"></script>
<script src="{{asset('js/waves.js')}}"></script>
<script src="{{asset('js/jquery.slimscroll.js')}}"></script>
<!-- App js -->
<script src="{{asset('js/jquery.core.js')}}"></script>
<script src="{{asset('js/jquery.app.js')}}"></script>
</body>
</html>

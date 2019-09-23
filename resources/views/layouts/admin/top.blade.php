<div class="topbar">
    <nav class="navbar-custom">
        <ul class="list-unstyled topbar-right-menu float-right mb-0">
            {{--<li class="hide-phone app-search">--}}
                {{--<form>--}}
                    {{--<input type="text" placeholder="搜索..." class="form-control">--}}
                    {{--<button type="submit"><i class="fa fa-search"></i></button>--}}
                {{--</form>--}}
            {{--</li>--}}
            @if($rows>0)
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <i class="fi-bell noti-icon"></i>
                    <span class="badge badge-danger badge-pill noti-icon-badge">{{$rows}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">

                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0"><span class="float-right"><a href="{{route('admin.all_read')}}"
                                                                     class="text-dark"><small>全部已读</small></a> </span>通知
                        </h5>
                    </div>

                        <div class="slimscroll" style="max-height: 230px;">
                        @foreach($notifications as $notification)
                            <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i>
                                    </div>
                                    <p class="notify-details">{{$notification->data['title']}}
                                        <small class="text-muted">{{$notification->data['created_at']}}</small>
                                    </p>
                                </a>
                            @endforeach
                        </div>

                    <!-- All-->
                    <a href="javascript:void(0);"
                       class="dropdown-item text-center text-primary notify-item notify-all">
                        查看全部 <i class="fi-arrow-right"></i>
                    </a>

                </div>

            </li>
            @endif
            {{--<li class="dropdown notification-list">--}}
                {{--<a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"--}}
                   {{--aria-haspopup="false" aria-expanded="false">--}}
                    {{--<i class="fi-speech-bubble noti-icon"></i>--}}
                    {{--<span class="badge badge-custom badge-pill noti-icon-badge">6</span>--}}
                {{--</a>--}}
                {{--<div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">--}}

                    {{--<!-- item-->--}}
                    {{--<div class="dropdown-item noti-title">--}}
                        {{--<h5 class="m-0"><span class="float-right"><a href="" class="text-dark"><small>Clear All</small></a> </span>Chat--}}
                        {{--</h5>--}}
                    {{--</div>--}}

                    {{--<div class="slimscroll" style="max-height: 230px;">--}}
                        {{--<!-- item-->--}}
                        {{--<a href="javascript:void(0);" class="dropdown-item notify-item">--}}
                            {{--<div class="notify-icon"><img src=" "--}}
                                                          {{--class="img-fluid rounded-circle" alt=""/></div>--}}
                            {{--<p class="notify-details">Cristina Pride</p>--}}
                            {{--<p class="text-muted font-13 mb-0 user-msg">Hi, How are you? What about our next--}}
                                {{--meeting</p>--}}
                        {{--</a>--}}

                        {{--<!-- item-->--}}
                        {{--<a href="javascript:void(0);" class="dropdown-item notify-item">--}}
                            {{--<div class="notify-icon"><img src=" "--}}
                                                          {{--class="img-fluid rounded-circle" alt=""/></div>--}}
                            {{--<p class="notify-details">Sam Garret</p>--}}
                            {{--<p class="text-muted font-13 mb-0 user-msg">Yeah everything is fine</p>--}}
                        {{--</a>--}}

                        {{--<!-- item-->--}}
                        {{--<a href="javascript:void(0);" class="dropdown-item notify-item">--}}
                            {{--<div class="notify-icon"><img src=" "--}}
                                                          {{--class="img-fluid rounded-circle" alt=""/></div>--}}
                            {{--<p class="notify-details">Karen Robinson</p>--}}
                            {{--<p class="text-muted font-13 mb-0 user-msg">Wow that's great</p>--}}
                        {{--</a>--}}

                        {{--<!-- item-->--}}
                        {{--<a href="javascript:void(0);" class="dropdown-item notify-item">--}}
                            {{--<div class="notify-icon"><img src=" "--}}
                                                          {{--class="img-fluid rounded-circle" alt=""/></div>--}}
                            {{--<p class="notify-details">Sherry Marshall</p>--}}
                            {{--<p class="text-muted font-13 mb-0 user-msg">Hi, How are you? What about our next--}}
                                {{--meeting</p>--}}
                        {{--</a>--}}

                        {{--<!-- item-->--}}
                        {{--<a href="javascript:void(0);" class="dropdown-item notify-item">--}}
                            {{--<div class="notify-icon"><img src=" "--}}
                                                          {{--class="img-fluid rounded-circle" alt=""/></div>--}}
                            {{--<p class="notify-details">Shawn Millard</p>--}}
                            {{--<p class="text-muted font-13 mb-0 user-msg">Yeah everything is fine</p>--}}
                        {{--</a>--}}
                    {{--</div>--}}

                    {{--<!-- All-->--}}
                    {{--<a href="javascript:void(0);"--}}
                       {{--class="dropdown-item text-center text-primary notify-item notify-all">--}}
                        {{--View all <i class="fi-arrow-right"></i>--}}
                    {{--</a>--}}

                {{--</div>--}}
            {{--</li>--}}

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <img src="{{auth('manager')->user()->avatar}}" alt="user" class="rounded-circle"> <span
                        class="ml-1">{{auth('manager')->user()->name}} <i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="text-overflow m-0">欢迎 !</h5>
                    </div>

                    <!-- item-->
                    <a href="{{route('admin.manager.edit',auth('manager')->id())}}" class="dropdown-item notify-item">
                        <i class="fi-head"></i> <span>个人信息</span>
                    </a>

                    <!-- item-->
                    <a href="{{route('admin.site.index')}}" class="dropdown-item notify-item">
                        <i class="fi-cog"></i> <span>网站设置</span>
                    </a>
                    <!-- item-->
                    <a href="{{route('admin.logout')}}" class="dropdown-item notify-item">
                        <i class="fi-power"></i> <span>退出</span>
                    </a>
                </div>
            </li>
        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left disable-btn">
                    <i class="dripicons-menu"></i>
                </button>
            </li>
            <li>
                <div class="page-title-box">
                    <h4 class="page-title">{{isset($title)?$title:''}} </h4>
                    {{ Breadcrumbs::render() }}
                </div>
            </li>

        </ul>

    </nav>

</div>

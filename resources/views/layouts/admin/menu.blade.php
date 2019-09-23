<!-- 左侧菜单 -->
<div class="left side-menu">

    <div class="slimscroll-menu" id="remove-scroll">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="index.html" class="logo">
                            <span>
                                <img src="{{asset('images/logo.png')}} " alt="" height="22">
                            </span>
                <i>
                    <img src="assets/images/logo_sm.png" alt="" height="28">
                </i>
            </a>
        </div>
        <!-- User box -->
        <div class="user-box">
            <div class="user-img">
                <img src="{{auth('manager')->user()->avatar}}" alt="user-img" title="Mat Helme"
                     class="rounded-circle img-fluid">
            </div>
            <h5><a href="#">{{auth('manager')->user()->name}}</a></h5>
            <p class="text-muted">{{auth('manager')->user()->email}}</p>
        </div>
        <!--- Sidemenu -->

        <div id="sidebar-menu">
            {!! $menus !!}
        </div>
        <!-- Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>

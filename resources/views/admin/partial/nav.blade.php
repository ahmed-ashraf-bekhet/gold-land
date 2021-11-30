<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">@lang($langFile.'Menu')</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">@lang($langFile.'Side Menu')</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('admin-lte/dist/img/avatar5.png') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ asset('admin-lte/dist/img/avatar5.png') }}" class="img-circle" alt="User Image">
                            <p>
                                {{ auth()->user()->name }}
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">@lang($langFile.'Profile')</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="btn btn-default btn-flat">@lang($langFile.'Logout')</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- Language dropdown -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        @if(app()->getLocale() == 'en')
                            English
                        @else
                            العربية
                        @endif
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{route('switch.lang','en')}}" class="nav-link">English</a>
                        </li>
                        <li>
                            <a href="{{route('switch.lang','ar')}}" class="nav-link">العربية</a>
                        </li>
                    </ul>
                </li>

                <!-- Control Sidebar Toggle Button -->
                <li>
                    {{-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> --}}
                </li>
            </ul>
        </div>
    </nav>
</header>

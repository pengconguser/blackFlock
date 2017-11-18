<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                黑白路
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li class="{{ active_class((if_route('category.show') && if_route_param('category', 1))) }}"><a href="{{ route('category.show', 1) }}">laravel随笔</a></li>
                <li class="{{ active_class((if_route('category.show') && if_route_param('category', 2))) }}"><a href="{{ route('category.show', 2) }}">社区公告</a></li>
                <li class="{{ active_class((if_route('category.show') && if_route_param('category', 3))) }}"><a href="{{ route('category.show', 3) }}">laravel教程</a></li>
                <li class="{{ active_class((if_route('category.show') && if_route_param('category', 4))) }}"><a href="{{ route('category.show', 4) }}">redis</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">登录</a></li>
                    <li><a href="{{ route('register') }}">注册</a></li>
                @else
                    <li>
                        <a href="{{ route('article.create') }}">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                                <img src="{{ Auth::user()->avatar }}" class="img-responsive img-circle" width="30px" height="30px">
                            </span>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/article/user">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>个人面板
                             </a></li>
                            <li><a href="{{ route('users.edit',Auth::id()) }}">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            编辑资料
                            </a></li>
                            <li><a href="/game">
                            <span class="glyphicon glyphicon-modal-window" aria-hidden="true"></span>
                            五子棋小游戏
                            </a></li>
                            <li>
                                <a href="/">
                                    <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                    退出社区到首页
                                </a>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
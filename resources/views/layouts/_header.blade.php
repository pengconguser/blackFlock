<header class="navbar navbar-fixed-top navbar-inverse">
  <div class="container">
    <div class="col-md-offset-1 col-md-10">
      <a href="/" id="logo">peng App</a>
      <nav>
        <ul class="nav navbar-nav navbar-right">
          @if (Auth::check())
            <li><a href="/users">用户列表</a></li>
            <li><a href="/article">小博客</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                {{ Auth::user()->name }} <b class="caret"></b>
              </a>
                <li><a href="{{ route('users.show', Auth::user()->id) }}">个人中心</a></li>
                <li><a href="{{ route('users.edit', Auth::user()->id) }}">编辑资料</a></li>
                <li>
                  <a id="logout" href="#">
                    <form action="{{ route('logout') }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button class="btn btn-block btn-danger" type="submit" name="button">退出登录</button>
                    </form>
                  </a>
                </li>
              </ul>
            </li>
          @else
          <li><a href="/article">小博客</a></li>
          <li><a href="/help">帮助</a></li>
          <li><a href="/login">登录</a></li>
          @endif
        </ul>
      </nav>
    </div>
  </div>
</header>
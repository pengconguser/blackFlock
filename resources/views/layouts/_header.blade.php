<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">黑白路</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse navbar-right">
          <ul class="nav navbar-nav">
            @if (Auth::check())
              <li><a href="/article">小社区</a></li>
            <li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                                <img src="{{ Auth::user()->avatar }}" class="img-responsive img-circle" width="30px" height="30px">
                            </span>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
             <ul class="dropdown-menu" role="menu">
                            <li><a href="/users/{{ Auth::user()->id }}">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>个人中心
                             </a></li>
                            <li><a href="{{ route('users.edit',Auth::id()) }}">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            编辑资料
                            </a></li>
                                <li>
                  <a id="logout" href="#">
                    <form action="{{ route('logout') }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button class="btn btn-sm btn-danger" type="submit" name="button">退出登录</button>
                    </form>
                  </a>
                </li>
    
               </ul>
              </li>
          @else
          <li><a href="/help">帮助</a></li>
          <li><a href="/login">登录</a></li>
          @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>




{{-- <header class="navbar navbar-fixed-top navbar-inverse" style="height: 20px">
  <div class="container">
    <div class="col-md-offset-1 col-md-10 col-sm-3">
      <a href="/" id="logo">黑白路</a>
      <nav>
        <ul class="nav navbar-nav navbar-right">
          @if (Auth::check())
              <li><a href="/article">小社区</a></li>
            <li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="user-avatar pull-left" style="margin-right:8px; margin-top:-5px;">
                                <img src="{{ Auth::user()->avatar }}" class="img-responsive img-circle" width="30px" height="30px">
                            </span>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
             <ul class="dropdown-menu" role="menu">
                            <li><a href="/users/{{ Auth::user()->id }}">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>个人中心
                             </a></li>
                            <li><a href="{{ route('users.edit',Auth::id()) }}">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            编辑资料
                            </a></li>
                                <li>
                  <a id="logout" href="#">
                    <form action="{{ route('logout') }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button class="btn btn-sm btn-danger" type="submit" name="button">退出登录</button>
                    </form>
                  </a>
                </li>
    
               </ul>
              </li>
          @else
          <li><a href="/help">帮助</a></li>
          <li><a href="/login">登录</a></li>
          @endif
        </ul>
      </nav>
    </div>
  </div>
</header> --}}
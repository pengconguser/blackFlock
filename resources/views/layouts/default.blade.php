
<html>
  <head>
    <title>@yield('title', '黑白路') - composer	</title>
    <link rel="stylesheet" href="/css/app.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
    @include('layouts._header')
<div id="app">
    <div class="container">
      <div class="col-md-offset-1 col-md-10">
        @include('shared._messages')
        @yield('content')
        @include('layouts._footer')
      </div>
    </div>
</div>
{{--     <script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>  --}}
    <script src="/js/app.js"></script>
  </body>
</html>
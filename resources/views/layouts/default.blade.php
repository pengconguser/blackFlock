
<html>
  <head>
    <title>@yield('title', '黑白路')</title>
    <link rel="stylesheet" href="/css/app.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="/js/jquery.cookie.js" ></script>

    @stack('scripts')
  </body>
</html>
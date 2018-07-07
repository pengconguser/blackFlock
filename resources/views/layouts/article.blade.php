<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'bbs') - 黑白路社区</title>
    <meta name="description" content="@yield('description', '黑白路社区')" />

    <!-- Styles -->
    <link href="{{ asset('css/article.css') }}" rel="stylesheet">
    @yield('styles')

</head>

<body>
    <div id="app" class="{{ route_class() }}-page">

        @include('layouts._header_article')

        <div class="container">
            @include('shared._messages')
            @yield('content')

        </div>

        @include('layouts._footer_article')
    </div>



    @if(Auth::check())
    <script type="text/javascript">
         window.getAcccessToken=function getAcccessToken(){
             var access_token=localStorage.getItem('access_token');
             return access_token;
         }
    </script>
    @endif

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="/js/jquery.cookie.js" ></script>



    @stack('scripts')
    @yield('scripts')
</body>
</html>
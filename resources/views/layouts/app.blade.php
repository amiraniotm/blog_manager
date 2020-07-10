<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('partials._head')

<body>
    <div id="app">

        @include('partials._nav')

    <div class="container cont-mar-top">
        @yield('content')
      </div>

    </div>
</body>
</html>

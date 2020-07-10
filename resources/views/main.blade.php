@extends('layouts.app')

  <body>

    <div class="container">

      @include('partials._messages')

      @yield('content')

    </div>

      @include('partials._javascript')

  </body>
</html>

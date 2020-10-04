<!DOCTYPE html>
<html lang="en">
@include('partials._head')

  <body>
    <!-- topnavbar -->
    @include('partials._nav')

    <div class="container">
      @include('partials._messages')
      @yield('content')

    </div>
  <hr>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    @include('partials._javascript')

    @yield('scripts')
  </body>
    @include('partials._footer')
</html>

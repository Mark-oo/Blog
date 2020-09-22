@extends('main')

@section('title','| Home')

@section('content')

    <div class="container">
      <!-- some shit -->
      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
           <h1 class="display-4">Welcome to Myvlog</h1>
           <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
           <a class="btn btn-primary btn-lg" href="#" role="button">Popular post</a>
          </div>
        </div>
      </div>

      <div class="row">
        <!-- main -->
        <div class="col-md-8">
          <div class="post">
            <h3>Post Title</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum...</p>
            <a href="#" class="btn btn-primary">Read more</a>
          </div>

          <hr>

          <div class="post">
            <h3>Post Title</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum...</p>
            <a href="#" class="btn btn-primary">Read more</a>
          </div>

          <hr>

          <div class="post">
            <h3>Post Title</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum...</p>
            <a href="#" class="btn btn-primary">Read more</a>
          </div>

          <hr>

          <div class="post">
            <h3>Post Title</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum...</p>
            <a href="#" class="btn btn-primary">Read more</a>
          </div>

        </div>
        <!-- sidebar -->
        <div class="col-md-3 col-md-offset-1"><h2>Sidebar</h2>
        </div>

      </div>

    </div>
@endsection

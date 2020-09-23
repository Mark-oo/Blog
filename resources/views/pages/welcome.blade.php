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

          @foreach($posts as $post)
          <div class="post">
            <h3>{{$post->title}}</h3>
            <p>{{substr($post->body,0,200)}}{{strlen($post->body)>200?'...':''}}</p>
            <a href="#" class="btn btn-primary">Read more</a>
          </div>

          <hr>
        @endforeach
        </div>
        <!-- sidebar -->
        <div class="col-md-3 col-md-offset-1">
          <h2>Sidebar</h2>
        </div>

      </div>

    </div>
@endsection

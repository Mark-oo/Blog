@extends('main')

@section('title','|All posts')

@section('content')

  <div class="row">
    <div class="col-md-10">
      <h1 class="h1-spaceing">All posts</h1>
    </div>
    <div class="col-md-2">
      <a href="{{route('posts.create')}}" class="btn btn-secondary btn-block btn-h1-spaceing">Create new post</a>
    </div>
    <div class="col-md-12">
          <hr>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <th>#</th><th>Title</th><th>Body</th><th>Category</th><th>Created at</th><th></th>
        </thead>
        <tbody>
          @foreach ($posts as $post)
            <tr>
              <th>{{$post->id}}</th>
              <td>{{substr($post->title,0,30)}}{{strlen($post->title)>20?'...':''}}</td>
              <td>{{substr($post->body,0,20)}}{{strlen($post->body)>20?'...':''}}</td>
              <td>{{substr($post->Category->name,0,20)}}{{strlen($post->Category->name)>20?'...':''}}</td>
              <td>{{date('D, d M Y H:i',strtotime($post->created_at))}}</td>
              <td><a href="{{route('posts.show',$post->id)}}" class="btn btn-default">View</a><a href="{{route('posts.edit',$post->id)}}" class="btn btn-default">Edit</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
        {{$posts->links()}}
    </div>
  </div>

@endsection

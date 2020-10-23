@extends('main')
@section('title','| Delete comment')
@section('content')
  <div class="">
    <h2>Delete this Comment?</h2>
    {{Form::open(['route'=>['comments.destroy',$comment->id],'method'=>'DELETE'])}}
    {{Form::submit('Yes',['class'=>'btn btn-outline-dark form-control'])}}
    <a href="{{route('posts.show',$comment->post_id)}}" class="form-control btn bt-outline-default">No</a>
    {{Form::close()}}
  </div>
@endsection

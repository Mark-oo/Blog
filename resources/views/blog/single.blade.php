@extends('main')

@section('title',"| $post->title")
@section('content')

 <div class="row">
   <div class="col-md-8 col-md-offset-2">
     <h1>{{$post->title}}</h1>
     <img src="{{asset('images/'.$post->image)}}" height="400" width="800"/ alt="">
     <p>{!!$post->body!!}</p>
     <hr>
     @if($post->category_id==0)
     <p>No category associated</p>
     @else
       <p>Posted in:{{$post->category->name}}</p>
     @endif
   </div>
   @include('comments.comments')
 </div>

@endsection

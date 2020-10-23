@extends('main')
 @section('title','|Blog')
  @section('content')
    <div class="row">
      <div class="col-md-12">
        <h1>Blog</h1>
      </div>
    </div>

   @foreach($post as $p)
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <h2>{{$p->title}}</h2>
        <h5>Published: {{date('D, d M Y H:i',strtotime($p->created_at))}}</h5>
        <p>{{substr(strip_tags($p->body),0,120)}}{{strlen(strip_tags($p->body))>120?'...':''}}</p>
        <a href="{{route('blog.single',$p->slug)}}" class="btn btn-primary">Read more</a>
      </div>
    </div>
    <hr>
   @endforeach
   <div class="row">
     <div class="col-md-12">
       <div class="text-center">
         {{$post->links()}}
       </div>
     </div>
   </div>

 @endsection

@extends('main')

@section('title',"| $post->title")
@section('content')

 <div class="row">
   <div class="col-md-8 col-md-offset-2">
     <h1>{{$post->title}}</h1>
     <p>{{$post->body}}</p>
     <hr>
     @if($post->category_id==0)
     <p>No category associated</p>
     @else
       <p>Posted in:{{$post->category->name}}</p>
     @endif
   </div>
 </div>
 @if(Auth::check())
 <div class="col-md-8 col-md-offset-2" style="margin-left:-15px;">
    <form>
      {{Form::open(['route'=>['comments.store',$post->id],'method'=>'POST'])}}
      <div class="row">
        <div class="col-10">
          {{Form::text('comment',null,['class'=>'form-control','placeholder'=>'Leave a comment...'])}}
        </div>
        <div class="col-2">
          {{Form::submit('Comment',['class'=>'form-control btn btn-primary'])}}
        </div>
      </div>
      {{Form::close()}}
    </form>
 </div>
@endif()

@endsection

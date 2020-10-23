@extends('main')

@section('title','|View content')

@section('content')
  <div class="row">
    <div class="col-md-8">
      <h1>{{$post->title}}</h1>
      <hr>
      <div>
      @foreach ($post->tags as $tag)
        <span class="badge badge-secondary">{{$tag->name}}</span>
      @endforeach
      </div>
      <div>
        <span class="icon-spaceing glyphicon glyphicon-comment">
        </span>{{$post->comments->count()}} Comments
      </div>
      <br>
      <p class="lead">{!!$post->body!!}</p>
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
         @foreach ($post->comments as $comment)
            <div class="comment">
              <img src="{{"https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->user->email)))."?s=50&d=monsterid"}}" class="author-image">
              <div class="info">
                <h4><strong>{{$comment->user->name}}:</strong></h4>
                <p class="time">{{date('F n,Y -G:m',strtotime($comment->created_at))}}</p>
              </div>
              <div class="row comment-body">
                <div class="col-9">
                  {{$comment->comment}}
                </div>
                <div class="col-3">
                  <a href="{{route('comments.edit',$comment->id)}}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                  <a href="{{route('comments.delete',$comment->id)}}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                </div>
              </div>
            </div>
            <hr>
         @endforeach
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="well">
        <dl class="dl-horizontal">
          <dt>Url slug:</dt>
          <dd><a href="{{url('blog/'.$post->slug)}}">{{url('blog/'.$post->slug)}}</a></dd>
        </dl>
        <dl class="dl-horizontal">
          <dt>Category:</dt>
          <dd>{{isset($post->category->name)?$post->category->name:"No category selected"}}</dd>
        </dl>
        <dl class="dl-horizontal">
          <dt>Created at:</dt>
          <dd>{{date('D, d M Y H:i',strtotime($post->created_at))}}</dd>
        </dl>
        @if ($post->created_at!=$post->updated_at)
        <dl class="dl-horizontal">
          <dt>Last Updated:</dt>
          <dd>{{date('D, d M Y H:i',strtotime($post->updated_at))}}</dd>
        </dl>
        @endif
        <hr>
        <div class="row">
          <div class="col-sm-6">
            {!!Html::linkRoute('posts.edit','Edit',[$post->id],['class'=>'btn btn-primary btn-block'])!!}
          </div>
          <div class="col-sm-6">
            {!!Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE'])!!}
            {!!Form::submit('Delete',['class'=>'btn btn-danger btn-block'])!!}
            {!!Form::close()!!}
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            {{Html::linkRoute('posts.index','See All Posts',[],['class'=>'btn btn-outline-secondary btn-block btn-h1-spaceing'])}}
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection()

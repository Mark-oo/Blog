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
      <br>
      <p class="lead">{{$post->body}}</p>
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

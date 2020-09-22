@extends('main')

@section('title','|View content')

@section('content')
  <div class="row">
    <div class="col-md-8">
      <h1>{{$post->title}}</h1>
      <p class="lead">{{$post->body}}</p>
    </div>
    <div class="col-md-4">
      <div class="well">
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
            {!!Html::linkRoute('posts.destroy','Delete',[$post->id],['class'=>'btn btn-danger btn-block'])!!}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection()

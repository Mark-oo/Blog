@extends('main')

@section('title','|Edit Post')

@section('content')
  <div class="row">
    {!!Form::model($post,['route'=>['posts.update',$post->id]])!!}
    <div class="col-md-12">
      {{Form::label('title','Title:')}}
      {{Form::text('title',null,['class'=>'form-control'])}}
      {{Form::label('body','Body:')}}
      {{Form::textarea('body',null,['class'=>'form-control','rows'=>'15','cols'=>'60'])}}
      {!!Form::close()!!}
    </div>

    <div class="col-md-4 col-md-offset-2 ">
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
            {!!Html::linkRoute('posts.show','Cancel',[$post->id],['class'=>'btn btn-danger btn-block'])!!}
          </div>
          <div class="col-sm-6">
            {{Form::submit('Save Changes',['class'=>'btn btn-primary btn-block'])}}
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection()

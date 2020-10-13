@extends('main')

@section('title','|Edit Post')

@section('content')
    {!!Form::model($post,['route'=>['posts.update',$post->id],'method'=>'PUT'])!!}
    <div class="form-row">
    <div class="col">
      {{Form::label('title','Title:')}}
      {{Form::text('title',null,['class'=>'form-control form-control-lg'])}}
      {{Form::label('slug','Slug:')}}
      {{Form::text('slug',null,['class'=>'form-control form-control-lg'])}}

      {{Form::label('category_id','Category:')}}
      {{Form::select('category_id',$categories,null,['class'=>'form-control'])}}

      {{Form::label('body','Body:')}}
      {{Form::textarea('body',null,['class'=>'form-control','rows'=>'15','cols'=>'60'])}}
    </div>

    <div class="col">
      <div class="well">
        <dl class="dl-horizontal">
          <dt>Url slug:</dt>
          <dd><a href="{{url($post->slug)}}">{{url($post->slug)}}</a></dd>
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
            {!!Html::linkRoute('posts.show','Cancel',[$post->id],['class'=>'btn btn-danger btn-block'])!!}
          </div>
          <div class="col-sm-6">
            {{Form::submit('Save Changes',['class'=>'btn btn-primary btn-block'])}}
          </div>
        </div>
      </div>
    </div>
    {!!Form::close()!!}
  </div>

@endsection()

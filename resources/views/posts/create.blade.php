@extends('main')

@section('title','|Create new post')

@section('stylesheets')

  {!! Html::style('css/parsley.css') !!}

@endsection

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h2>Create new post</h2>
      <hr>
      {!! Form::open(['route' => 'posts.store','data-parsley-validate'=>'']) !!}
        {{Form::label('title','Title:')}}
        {{Form::text('title',null,['class'=>'form-control','required'=>'','maxlength'=>'255'])}}

        {{Form::label('slug','Slug:')}}
        {{Form::text('slug',null,['class'=>'form-control','required'=>'','minlenght'=>'5','maxlenght'=>'255'])}}

        {{Form::label('body',"Post Body:")}}
        {{Form::textarea('body',null,['class'=>'form-control','required'=>''])}}

        {{Form::submit('Create Post',array('class'=>'form-control btn btn-secondary','style'=>'margin-top: 20px;'))}}
      {!! Form::close() !!}

    </div>

  </div>

@endsection

@section('scripts')
  {!! Html::script('js/parsley.min.js') !!}
@endsection

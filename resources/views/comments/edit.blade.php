@extends('main')
@section('title','| Edit comment')
@section('content')
  <h2>Edit Comment</h2>
  {{Form::model($comment,['route'=>['comments.update',$comment->id],'method'=>'PUT'])}}
  {{Form::label('name','Name:')}}
  {{Form::text('name',$comment->user->name,['class'=>'form-control','disabled'=>'disabled'])}}

  {{Form::label('comment','Comment:')}}
  {{Form::textarea('comment',null,['class'=>'form-control'])}}
  {{Form::submit('Edit',['class'=>'form-control btn btn-outline-primary'])}}
  {{Form::close()}}
@endsection

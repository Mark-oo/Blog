@extends('main')

@section('title',"| Edit Tag")
@section('content')
  {{Form::model($tag,['route'=>['tag.update',$tag->id],'method'=>"PUT"])}}
  {{Form::label('name','Title')}}
  {{Form::text('name',null,['class'=>'form-control'])}}
  {{Form::submit('Save Changes',['class'=>'btn btn-outline-primary'])}}
  {{Form::close()}}
@endsection

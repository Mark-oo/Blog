@extends('main')

@section('title','| Forgot Password')
@section('content')
  {!!Form::open(['url'=>'password/reset','method'=>'POST'])!!}
  {{Form::hidden('token',$token)}}
  <h2>Reset password</h2>
  {{Form::label('email',"Email")}}
  {{Form::email('email',$email,['class'=>'form-control'])}}

  {{Form::label('password',"New password")}}
  {{Form::password('password',['class'=>'form-control'])}}

  {{Form::label('password_confirmation',"Confirm password")}}
  {{Form::password('password_confirmation',['class'=>'form-control'])}}
  <br>
  {{Form::submit('Reset',['class'=>'form-control btn btn-outline-primary'])}}

  {!!Form::close()!!}
@endsection()

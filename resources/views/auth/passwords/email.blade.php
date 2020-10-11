@extends('main')

@section('title','| Forgot Password')
@section('content')


  {!!Form::open(['url'=>'password/email','method'=>'POST'])!!}
  <h2>Reset password</h2>
  @if(session('status'))
    <div class="alert alert-primary" role="alert">
  {{session('status')}}
</div>
  @endif
  {{Form::label('email',"Email")}}
  {{Form::email('email',null,['class'=>'form-control'])}}
  <br>
  {{Form::submit('Reset',['class'=>'form-control btn btn-outline-primary'])}}

  {!!Form::close()!!}
@endsection()

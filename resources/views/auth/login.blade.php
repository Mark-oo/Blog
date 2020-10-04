@extends('main')
@section('title','| Regiter')
@section('content')
{!!Form::open()!!}

{{Form::label('email',"Email")}}
{{Form::email('email',null,['class'=>'form-control'])}}

{{Form::label('password',"Password")}}
{{Form::password('password',['class'=>'form-control'])}}

<br>
{{Form::checkbox('remember')}}{{Form::label('remember',"Remember Me")}}
<br>
{{Form::submit('Login',['class'=>'form-control btn btn-outline-primary'])}}

{!!Form::close()!!}
@endsection()

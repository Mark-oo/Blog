@extends('main')
@section('title','| Register')
@section('content')
{!!Form::open()!!}
{{Form::label('name',"Name")}}
{{Form::text('name',null,['class'=>'form-control'])}}

{{Form::label('email',"Email")}}
{{Form::text('email',null,['class'=>'form-control'])}}

{{Form::label('password',"Password")}}
{{Form::password('password',['class'=>'form-control'])}}

{{Form::label('password_confirmation',"Confirm Password")}}
{{Form::password('password_confirmation',['class'=>'form-control'])}}
<br>

{{Form::submit('Register',['class'=>'form-control btn btn-outline-primary'])}}
{!!Form::close()!!}
@endsection()

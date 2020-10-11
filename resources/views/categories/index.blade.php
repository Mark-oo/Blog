@extends('main')
@section('title','| All Categories')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">
     <h1>Categories</h1>
     <table class="table table-hover">
      <thead class="thead-dark">
       <tr>
         <th>#</th>
         <th>Name</th>
       </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)
          <tr>
            <td>{{$category->id}}</th>
            <td>{{$category->name}}</th>
          </tr>
        @endforeach()
      </tbody>
     </table>
    </div>
    <div class="col-md-4">
     <div class="card background-colour">
       <div class="card-body">
       {!!Form::open(['route'=>'categories.store'])!!}
       <h2>New Category</h2>
       {{Form::label('name','Name')}}
       {{Form::text('name',null,['class'=>'form-control'])}}
       {{Form::submit('Create New Category',['class'=>'btn btn-outline-secondary btn-spaceing-top'])}}
       {!!Form::close()!!}
       </div>
     </div>
    </div>
  </div>
</div>
@endsection

@extends('main')

@section('title','|Create new post')

@section('stylesheets')


  {!! Html::style('css/parsley.css') !!}
  {!! Html::style('css/select2.min.css') !!}

  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  <script>
  tinymce.init({
        selector: 'textarea',
        plugins: 'link code',

        // menubar: 'insert',
        // toolbar: 'link'
      });

  </script>

@endsection

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h2>Create new post</h2>
      <hr>
      {!! Form::open(['route' => 'posts.store','data-parsley-validate'=>'','files'=>true]) !!}
        {{Form::label('title','Title:')}}
        {{Form::text('title',null,['class'=>'form-control','required'=>'','maxlength'=>'255'])}}

        {{Form::label('slug','Slug:')}}
        {{Form::text('slug',null,['class'=>'form-control','required'=>'','minlenght'=>'5','maxlenght'=>'255'])}}

        {{Form::label('category_id','Category:')}}
        <select class="form-control" name="category_id">
          <option value="0" selected>No category selected</option>
          @foreach($categories as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>

        {{Form::label('tags','Tags:')}}
        <select class="form-control js-example-basic-multiple" name="tags[]" multiple="multiple">
          @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
          @endforeach()
        </select>

        {{Form::label('featured_image','Upload image:')}}
        {{Form::file('featured_image',['class'=>'form-control'])}}

        {{Form::label('body',"Post Body:")}}
        {{Form::textarea('body',null,['class'=>'form-control','required'=>''])}}

        {{Form::submit('Create Post',array('class'=>'form-control btn btn-secondary','style'=>'margin-top: 20px;'))}}
      {!! Form::close() !!}

    </div>

  </div>

@endsection

@section('scripts')
  {!! Html::script('js/parsley.min.js') !!}
  {!! Html::script('js/select2.min.js') !!}
  <script type="text/javascript">
     $('.js-example-basic-multiple').select2();
  </script>
@endsection

@extends('main')

@section('title','|Edit Post')
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
    {!!Form::model($post,['route'=>['posts.update',$post->id],'method'=>'PUT','files'=>true])!!}
    <div class="form-row">
    <div class="col">
      {{Form::label('title','Title:')}}
      {{Form::text('title',null,['class'=>'form-control form-control-lg'])}}
      {{Form::label('slug','Slug:')}}
      {{Form::text('slug',null,['class'=>'form-control form-control-lg'])}}

      {{Form::label('category_id','Category:')}}
      {{Form::select('category_id',$categories,$post->catrgory_id,['class'=>'form-control','placeholder'=>'No category selected'])}}

      {{Form::label('tags','Tags:')}}
      {{Form::select('tags[]',$tags,null,['class'=>'form-control js-example-basic-multiple','multiple'=>'multiple','placeholder'=>'No tags selected'])}}

      {{Form::label('featured_image','Update image')}}
      {{Form::file('featured_image',['class'=>'form-control'])}}

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
@section('scripts')
  {!! Html::script('js/parsley.min.js') !!}
  {!! Html::script('js/select2.min.js') !!}
  <script type="text/javascript">
     $('.js-example-basic-multiple').select2();
  </script>
@endsection

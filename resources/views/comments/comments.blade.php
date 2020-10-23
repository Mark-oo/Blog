</div>
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h3><span class="icon-spaceing glyphicon glyphicon-comment"></span>{{$post->comments->count()}} Comments</h3>
   @foreach ($post->comments as $comment)
      <div class="comment">
        <img src="{{"https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->user->email)))."?s=50&d=monsterid"}}" class="author-image">
        <div class="info">
        <h4><strong>{{$comment->user->name}}:</strong></h4>
        <p class="time">{{date('F n,Y -G:m',strtotime($comment->created_at))}}</p>
        </div>
        <div class="comment-body">
          {{$comment->comment}}
        </div>
      </div>
      <hr>
   @endforeach
  </div>
</div>
@if(Auth::check())
<div class="col-md-8 col-md-offset-2" style="margin-left:-15px;">
     {{Form::open(['route'=>['comments.store',$post->id],'method'=>'POST'])}}
     <form>
     <div class="row">
       <div class="col-10">
         {{Form::text('comment',null,['class'=>'form-control','placeholder'=>'Leave a comment...'])}}
       </div>
       <div class="col-2">
         {{Form::submit('Comment',['class'=>'form-control btn btn-primary'])}}
       </div>
     </div>
     </form>
     {{Form::close()}}
</div>
@endif()

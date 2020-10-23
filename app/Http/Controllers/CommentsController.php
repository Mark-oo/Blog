<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use App\User;
use Session;

class CommentsController extends Controller
{
   public function __construct(){
     $this->middleware('auth',['except'=>'store']);
   }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$post_id)
    {
        $this->validate($request,[
          'comment'=>'required|max:300',
        ]);

        $post=Post::find($post_id);
        $comment=new Comment;

        $comment->user_id = auth()->user()->id;#SAUCE:memesgarden

        $comment->comment=$request->comment;
        $comment->approved=true;
        $comment->post()->associate($post);

        $comment->save();

        Session::flash('success','You have put your opinion on the internet');

        return redirect()->route('blog.single',[$post->slug]);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment=Comment::find($id);
        return view('comments.edit')->with('comment',$comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $comment=Comment::find($id);

      $this->validate($request,['comment'=>'required|max:255']);

      $comment->comment=$request->comment;
      $comment->save();

      Session::flash('success','Comment Edited');

      return redirect()->route('posts.show',$comment->post->id);
    }

    public function delete($id){
      $comment=Comment::find($id);
      return view('comments.delete')->with('comment',$comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment=Comment::find($id);
        $post_id=$comment->post_id;
        $comment->delete();
        Session::flash('success','Comment deleted');
        return redirect()->route('posts.show',$post_id);
    }
}

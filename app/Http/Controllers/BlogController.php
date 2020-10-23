<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class BlogController extends Controller
{

      public function getIndex(){
        $post=Post::paginate(10);
        return view('blog.index')->with('post',$post);
      }

    public function getSingle($slug){
      $post=Post::where('slug','=',$slug)->first();

      return view('blog.single')->with('post',$post);
    }
}

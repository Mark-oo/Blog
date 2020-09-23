<?php

namespace App\Http\Controllers;

use App\Post;

class  PagesController extends Controller {

  public function getIndex(){
   $posts=Post::orderBy('created_at','desc')->limit(4)->get();

   return view('/pages/welcome')->with('posts',$posts);
  }
  public function getAbout(){
    $first="marko";
    $last="knezevic";

    $fullname=$first." ".$last;
    $email="marko@marko.marko";
    $data=[
      'email'=>$email,
      'fullname'=>$fullname,
    ];
   return view('/pages/about')->withData($data);
  }
  public function getContact(){
   return view('/pages/contact');
  }
}

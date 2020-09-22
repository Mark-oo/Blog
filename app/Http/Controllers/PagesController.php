<?php

namespace App\Http\Controllers;

class  PagesController extends Controller {

  public function getIndex(){
   return view('/pages/welcome');
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

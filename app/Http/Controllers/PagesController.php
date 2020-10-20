<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;

use App\Mail\EmailContact;
use App\Order;
//use Illuminate\Support\Facades\Mail;

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

  public function ship(Request $request){
    $this->validate($request,[
      'email'=>'required|email',
      'subject'=>'min:3',
      'message'=>'min:10'
          ]);

    $data=[
      'email'=>$request->email,
      'subject'=>$request->subject,
      'bodyMessage'=>$request->message,
          ];

    Mail::to('marko44knezevic@gmail.com')->send(new EmailContact($data));
  }

  public function postContact(Request $request){
    $this->validate($request,[
      'email'=>'required|email',
      'subject'=>'min:3',
      'message'=>'min:10'
          ]);

      $data=[
        'email'=>$request->email,
        'subject'=>$request->subject,
        'bodyMessage'=>$request->message,
      ];

      Mail::send('emails.contact',$data,function($message) use ($data){
        $message->from($data['email']);
        $message->to('marko44knezevic@gmail.com');
        $message->subject($data['subject']);
      });
      Session::flash('success','Your mail has been sent.');

      return redirect('/');
  }
}

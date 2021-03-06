<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Purifier;
use Image;
use Storage;

class PostController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::orderBy('id','desc')->paginate(10);
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories=Category::all();
      $tags=Tag::all();
        return view('posts.create')->with('categories',$categories)->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request);
        $this->validate($request,[
          // oreder of validations is IMORTANT!!!
          'title'=>'required | max:255',
          'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
          'category_id'=>'integer',
          'body'=>'required',
          'featured_image'=>'sometimes|image',
        ]);
        $post=new Post;

        $post->title=$request->title;
        $post->slug=$request->slug;
        $post->category_id=$request->category_id;
        $post->body=Purifier::clean($request->body);

        if ($request->hasFile('featured_image')) {
          $image=$request->file('featured_image');
          $filename=md5(time()).'.'.$image->getClientOriginalExtension();
          $location=public_path('images/'.$filename);
          Image::make($image)->resize(800,400)->save($location);

          $post->image=$filename;
        }

        $post->save();
        $post->tags()->sync($request->tags,false);

        Session::flash('success','The blog post was successfully saved.');

        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post = Post::find($id);
      $categories=Category::all();
      $cats=[];
      foreach ($categories as $category) {
        $cats[$category->id]=$category->name;
      }
      $tags=Tag::all();
      $tags2=[];
      foreach ($tags as $tag) {
        $tags2[$tag->id]=$tag->name;
      }

      return view('posts.edit')->with('post',$post)->with('categories',$cats)->with('tags',$tags2);
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
      $post=Post::find($id);
      if($request->input('slug')==$post->slug){
          $this->validate($request,[
                'title'=>'required|max:255',
                'category_id'=>'nullable|integer',
                'body'=>'required',
                'featured_image'=>'sometimes|image',
                   ]);
      }else{
          $this->validate($request,[
                'title'=>'required|max:255',
                'category_id'=>'nullable|integer',
                'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body'=>'required',
                'featured_image'=>'sometimes|image',
                   ]);
      }

        $post=Post::find($id);
        $post->title=$request->input('title');
        $post->slug=$request->input('slug');
        $post->category_id=$request->input('category_id');
        $post->body=Purifier::clean($request->input('body'));

        if ($request->hasFile('featured_image')) {
          $image=$request->file('featured_image');
          $filename=md5(time()).'.'.$image->getClientOriginalExtension();
          $location=public_path('images/'.$filename);
          Image::make($image)->resize(800,400)->save($location);

          $oldImage=$post->image;

          $post->image=$filename;
          Storage::delete($oldImage);
        }


        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('success','This post was successfully updated!');

        return redirect()->route('posts.show',$post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->tags()->detach();
        Storage::delete($post->image);

        $post->delete();


        Session::flash('success','The post is deleted.');
        return redirect()->route('posts.index');
    }
}

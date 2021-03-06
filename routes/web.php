<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware'=>['web']],function(){

  // comments
  Route::get('comments/{id}/delete',['uses'=>'CommentsController@delete','as'=>'comments.delete']);
  Route::delete('comments/{id}',['uses'=>'CommentsController@destroy','as'=>'comments.destroy']);
  Route::put('comments/{id}',['uses'=>'CommentsController@update','as'=>'comments.update']);
  Route::get('comments/{id}/edit',['uses'=>'CommentsController@edit','as'=>'comments.edit']);
  Route::post('comments/{post_id}',['uses'=>'CommentsController@store','as'=>'comments.store']);
  // tags
  Route::resource('tag','TagController',['except'=>['create']]);

  // password reset
  // Route::post('password/reset','Auth\ResetPasswordController@reset');
  // Route::post('/password/email','Auth\ForgotPasswordController@sendResetLinkEmail');
  // Route::get('/password/reset/{token?}','Auth\ForgotPasswordController@showLinkRequestForm');

  // register
  // Route::post('/auth/register','Auth\RegisterController@register');
  // Route::get('/auth/register','Auth\RegisterController@showRegistrationForm');
  // authentication routes

  // login
  Auth::routes();
  Route::get('/logout','Auth\LoginController@logout');
  Route::post('/login','Auth\LoginController@login');
  Route::get('/login','Auth\LoginController@showLoginForm');
  // categories
  Route::resource('categories','CategoryController',['except'=>['create']]);#exept izbacuje iz routova da user ne bi mogo da zajebav
  // app routes
  Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle'])
       ->where('slug','[\w\d\-\_]+');
  Route::get('blog',['uses'=>'BlogController@getIndex','as'=>'blog.index']);
  Route::post('/contact','PagesController@postContact');
  Route::get('/contact','PagesController@getContact');
  Route::get('/about','PagesController@getAbout');
  Route::get('/','PagesController@getIndex');
  Route::resource('posts','PostController');
});

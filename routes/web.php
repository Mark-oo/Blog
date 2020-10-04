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

  // register
  Route::post('/auth/register','Auth\RegisterController@register');
  Route::get('/auth/register','Auth\RegisterController@showRegistrationForm');
  // authentication routes
  Auth::routes();
  Route::get('/logout','Auth\LoginController@logout');
  Route::post('/login','Auth\LoginController@login');
  Route::get('/login','Auth\LoginController@showLoginForm');


  Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle'])
       ->where('slug','[\w\d\-\_]+');
  Route::get('blog',['uses'=>'BlogController@getIndex','as'=>'blog.index']);
  Route::get('/contact','PagesController@getContact');
  Route::get('/about','PagesController@getAbout');
  Route::get('/','PagesController@getIndex');
  Route::resource('posts','PostController');
});

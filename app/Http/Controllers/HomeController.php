<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Category;

class HomeController extends Controller
{
    //

    public function __construct(){
//       $this->middleware('auth');
    }


    public function index(){
      $posts = Post::paginate(3);

      $categories = Category::all();

      return view('front.home',compact('posts','categories'));

    }


    public function post($slug){

     $post = Post::findBySlugOrFail($slug);

     $comments = $post->comments()->whereIsActive(1)->get();

     $categories = Category::all();

     return view('post',compact('post','comments','categories'));

    }

}

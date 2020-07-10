<?php

namespace App\Http\Controllers;

use App\Post;

class PagesController extends Controller {

  public function getIndex() {
    $post = Post::orderBy('created_at','desc')->take(4)->get();
    return view('welcome')->withPosts($post);
  }

}

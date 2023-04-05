<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class ShowController extends Controller
{
  public function __invoke(Post $post)
  {
    return view('personal.posts.show', compact('post'));
  }
}
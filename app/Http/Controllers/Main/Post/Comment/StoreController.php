<?php

namespace App\Http\Controllers\Main\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class StoreController extends Controller
{
  public function __invoke(Post $post)
  {
    return view('main.posts.show', $post->id);
  }
}
<?php

namespace App\Http\Controllers\Personal\Like;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
  public function __invoke()
  {
    $likedPosts = Auth::user()->likedPosts;
    // Post::find(1)->likes()->attach([1, 2]);
    $postLikes = Post::find(1)->likes;
    return view('personal.likes.index', compact('likedPosts', 'postLikes'));
  }
}
<?php

namespace App\Http\Controllers\Main\Post\Like;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Auth;
use Illuminate\Http\Request;

class StoreController extends Controller
{
  public function __invoke(Post $post)
  {
    if (!Auth::user()) {
      return to_route('login');
    }

    Auth::user()->likedPosts()->toggle($post->id);
    return back();
  }
}
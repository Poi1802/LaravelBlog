<?php

namespace App\Http\Controllers\Personal\Like;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class DestroyController extends Controller
{
  public function __invoke(Post $post)
  {
    Auth::user()->likedPosts()->detach($post->id);

    return to_route('personal.likes.index');
  }
}
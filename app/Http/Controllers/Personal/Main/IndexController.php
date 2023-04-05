<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Auth;

class IndexController extends Controller
{
  public function __invoke()
  {
    $postsCount = Auth::user()->posts()->count();
    $commentsCount = Auth::user()->userComments()->count();
    $likesCount = Auth::user()->likedPosts()->count();

    return view('personal.main.index', compact('postsCount', 'commentsCount', 'likesCount'));
  }
}
<?php

namespace App\Http\Controllers\Personal\Like;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
  public function __invoke()
  {
    $likedPosts = Auth::user()->likedPosts;

    return view('personal.likes.index', compact('likedPosts'));
  }
}
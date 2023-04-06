<?php

namespace App\Http\Controllers\Main\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
  public function __invoke()
  {
    $postsMain = Post::paginate(3);
    $postsRandom = Post::all()->diff($postsMain);
    $postsPopular = Post::withCount('likes')->orderByDesc('likes_count')->get()->take(3);

    return view('main.index', compact('postsMain', 'postsRandom', 'postsPopular'));
  }
}
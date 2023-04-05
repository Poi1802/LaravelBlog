<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\{Category, Tag, Post, User};
use Illuminate\Http\Request;

class IndexController extends Controller
{
  public function __invoke()
  {
    $catsCount = Category::count();
    $tagsCount = Tag::count();
    $postsCount = Post::count();
    $usersCount = User::count();

    return view('admin.main.index', compact('catsCount', 'tagsCount', 'postsCount', 'usersCount'));
  }
}
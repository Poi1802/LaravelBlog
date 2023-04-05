<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class CreateController extends Controller
{
  public function __invoke()
  {
    $categories = Category::all();
    $tags = Tag::all();

    return view('personal.posts.create', compact('categories', 'tags'));
  }
}
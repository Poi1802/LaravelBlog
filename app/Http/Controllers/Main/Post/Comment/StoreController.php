<?php

namespace App\Http\Controllers\Main\Post\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\Post\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;
use Auth;
use Illuminate\Http\Request;

class StoreController extends Controller
{
  public function __invoke(Post $post, StoreRequest $request)
  {
    $data = $request->validated();
    $data['user_id'] = Auth::user()->id;
    $data['post_id'] = $post->id;

    Comment::create($data);

    return to_route('main.posts.show', $post->id);
  }
}
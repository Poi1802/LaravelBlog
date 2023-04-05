<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class DestroyController extends Controller
{
  public function __invoke(Comment $comment)
  {
    $comment->delete();

    return to_route('personal.comments.index');
  }
}
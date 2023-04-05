<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
  public function __invoke(Comment $comment)
  {
    return view('personal.comments.edit', compact('comment'));
  }
}
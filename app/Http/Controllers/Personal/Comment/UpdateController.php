<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\UpdateRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
  public function __invoke(Comment $comment, UpdateRequest $request)
  {
    $data = $request->validated();

    $comment->update($data);

    return to_route('personal.comments.index');
  }
}
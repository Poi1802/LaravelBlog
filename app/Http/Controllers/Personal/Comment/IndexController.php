<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
  public function __invoke()
  {
    $userComments = Auth::user()->userComments;

    return view('personal.comments.index', compact('userComments'));
  }
}
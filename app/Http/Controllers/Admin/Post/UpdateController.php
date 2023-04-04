<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends BaseController
{
  public function __invoke(UpdateRequest $request, Post $post)
  {
    $data = $request->validated();

    $this->service->update($post, $data);

    return to_route('admin.posts.show', $post->id);
  }
}
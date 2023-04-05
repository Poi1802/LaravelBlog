<?php

namespace App\Http\Controllers\Personal\Post;

use App\Http\Requests\Personal\Post\StoreRequest;

class StoreController extends BaseController
{
  public function __invoke(StoreRequest $request)
  {
    $data = $request->validated();

    $this->service->store($data);

    return to_route('personal.posts.index');
  }
}
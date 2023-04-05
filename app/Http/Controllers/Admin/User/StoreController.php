<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;


class StoreController extends BaseController
{
  public function __invoke(StoreRequest $request)
  {
    $data = $request->validated();

    $this->service->store($data);

    return to_route('admin.users.index');
  }
}
<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;

class UpdateController extends Controller
{
  public function __invoke(UpdateRequest $request, User $user)
  {
    $data = $request->validated();
    if ($data['password'] === null) {
      unset($data['password']);
    }

    $user->update($data);

    return to_route('admin.users.index');
  }
}
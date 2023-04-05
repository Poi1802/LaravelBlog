<?php

namespace App\Services\Admin\User;

use App\Models\User;
use DB;
use App\Mail\User\PasswordMail;
use Hash;
use Illuminate\Auth\Events\Registered;
use Mail;
use Str;

class Service
{
  public function store($data)
  {
    try {
      DB::beginTransaction();

      $password = Str::random(10);
      $data['password'] = Hash::make($password);

      $user = User::firstOrCreate(['email' => $data['email']], $data);

      Mail::to($data['email'])->send(new PasswordMail($password));

      event(new Registered($user));

      DB::commit();
    } catch (\Exception $ex) {
      DB::rollBack();
      abort(500);
    }
  }
}
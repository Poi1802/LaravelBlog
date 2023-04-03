<?php

namespace App\Services\Admin\Post;

use App\Models\Post;
use DB;

class Service
{
  public function store($data)
  {
    try {
      DB::beginTransaction();
      $tags = $data['tag_ids'];
      unset($data['tag_ids']);

      $post = Post::firstOrCreate($data);

      $post->tags()->attach($tags);
      DB::commit();
    } catch (\Throwable $th) {
      DB::rollBack();
      abort(500);
    }
  }

  public function update($data)
  {
    # code...
  }
}
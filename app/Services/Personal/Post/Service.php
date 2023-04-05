<?php

namespace App\Services\Personal\Post;

use App\Models\Post;
use DB;
use Illuminate\Support\Facades\Storage;

class Service
{
  public function store($data)
  {
    // dd($data);
    try {
      DB::beginTransaction();
      $tags = $data['tag_ids'];
      unset($data['tag_ids']);

      $data['preview_img'] = Storage::disk('public')->put('/images', $data['preview_img']);
      $data['main_img'] = Storage::disk('public')->put('/images', $data['main_img']);

      $post = Post::create($data);

      $post->tags()->attach($tags);
      DB::commit();
    } catch (\Exception $ex) {
      DB::rollBack();
      dump($ex);
      abort(500);
    }
  }

  public function update($post, $data)
  {
    try {
      DB::beginTransaction();
      $tags = $data['tag_ids'];
      unset($data['tag_ids']);

      if (isset($data['preview_img'])) {
        Storage::disk('public')->delete($post->preview_img);
        $data['preview_img'] = Storage::disk('public')->put('/images', $data['preview_img']);
      }

      if (isset($data['main_img'])) {
        Storage::disk('public')->delete($post->main_img);
        $data['main_img'] = Storage::disk('public')->put('/images', $data['main_img']);
      }

      $post->update($data);

      $post->tags()->sync($tags);
      DB::commit();
    } catch (\Exception $ex) {
      DB::rollBack();
      abort(500);
    }
  }
}
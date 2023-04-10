<?php

namespace App\Services\Admin\Post;

use App\Models\Post;
use DB;
use Illuminate\Support\Facades\Storage;

class Service
{
  public function store($data)
  {
    try {
      DB::beginTransaction();
      if (isset($data['tag_ids'])) {
        $tags = $data['tag_ids'];
        unset($data['tag_ids']);
      }

      $data['preview_img'] = Storage::disk('public')->put('/images', $data['preview_img']);
      $data['main_img'] = Storage::disk('public')->put('/images', $data['main_img']);

      $post = Post::firstOrCreate($data);

      if (isset($tags)) {
        $post->tags()->attach($tags);
      }
      DB::commit();
    } catch (\Exception $ex) {
      DB::rollBack();
      abort(500);
    }
  }

  public function update($post, $data)
  {
    try {
      DB::beginTransaction();
      if (isset($data['tag_ids'])) {
        $tags = $data['tag_ids'];
        unset($data['tag_ids']);
      }

      if (isset($data['preview_img'])) {
        Storage::disk('public')->delete($post->preview_img);
        $data['preview_img'] = Storage::disk('public')->put('/images', $data['preview_img']);
      }

      if (isset($data['main_img'])) {
        Storage::disk('public')->delete($post->main_img);
        $data['main_img'] = Storage::disk('public')->put('/images', $data['main_img']);
      }

      $post->update($data);

      if (isset($tags)) {
        $post->tags()->sync($tags);
      }
      DB::commit();
    } catch (\Exception $ex) {
      DB::rollBack();
      abort(500);
    }
  }
}
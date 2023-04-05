<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    \App\Models\User::factory()->create([
      'name' => 'Eugen',
      'email' => 'evgen.bazhenov.2002@gmail.com',
      'password' => Hash::make('Fyufhcr123'),
      'email_verified_at' => now(),
      'role' => 0
    ]);

    $users = \App\Models\User::factory(10)->create();

    Category::factory(10)->create();
    $tags = Tag::factory(10)->create();
    $posts = Post::factory(20)->create();
    Comment::factory(40)->create();

    foreach ($posts as $post) {
      $tagIds = $tags->random(fake()->numberBetween(1, 5))->pluck('id');
      $userIds = $users->random(fake()->numberBetween(1, 10))->pluck('id');

      $post->tags()->attach($tagIds);
      $post->likes()->attach($userIds);
    }
  }
}
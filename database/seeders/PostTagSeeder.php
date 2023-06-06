<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all posts and tags
        $posts = Post::all();
        $tags = Tag::all();

        // Seed the pivot table
        foreach ($posts as $post) {
            $post->tags()->attach($tags->random(rand(1, 3))->pluck('id')->toArray());
        }
    }
}

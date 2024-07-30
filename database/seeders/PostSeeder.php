<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Wiki;

class PostSeeder extends Seeder
{
    public function run()
    {
        $wikis = Wiki::all();

        foreach ($wikis as $wiki) {
            Post::create([
                'wiki_id' => $wiki->id,
                'title' => 'Sample Post 1',
                'content' => 'This is the content of sample post 1.',
                'tags' => json_encode(['tag1', 'tag2']),
                'video_only' => false,
            ]);

            Post::create([
                'wiki_id' => $wiki->id,
                'title' => 'Sample Post 2',
                'content' => 'This is the content of sample post 2.',
                'tags' => json_encode(['tag3', 'tag4']),
                'video_only' => true,
            ]);
        }
    }
}
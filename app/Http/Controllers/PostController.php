<?php

namespace App\Http\Controllers;

use App\Models\Wiki;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Wiki $wiki, Post $post)
    {
        $post->increment('page_views');
        $tags = $wiki->posts()->pluck('tags')->flatten()->unique();
        return view('posts.show', compact('post', 'tags'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Wiki;
use Illuminate\Http\Request;

class WikiController extends Controller
{
    public function index()
    {
        $wikis = Wiki::paginate(10);
        return view('wikis.index', compact('wikis'));
    }

    public function show(Wiki $wiki)
    {
        $posts = $wiki->posts()->paginate(10);
        $tags = $wiki->posts()->pluck('tags')->flatten()->unique();
        return view('wikis.show', compact('wiki', 'posts', 'tags'));
    }

    public function search(Request $request, Wiki $wiki)
    {
        $query = $request->input('query');
        $searchContent = $request->input('search_content', false);

        $postsQuery = $wiki->posts()->where(function ($q) use ($query, $searchContent) {
            $q->where('title', 'like', "%{$query}%")
                ->orWhere('tags', 'like', "%{$query}%");

            if ($searchContent) {
                $q->orWhere('content', 'like', "%{$query}%");
            }
        });

        $posts = $postsQuery->paginate(10);
        $tags = $wiki->posts()->pluck('tags')->flatten()->unique();

        return view('wikis.show', compact('wiki', 'posts', 'tags'))
            ->with('query', $query)
            ->with('search_content', $searchContent);
    }

public function embed(Wiki $wiki)
    {
        // Return the view with the wiki data
        return view('wikis.embed', compact('wiki'));
    }

    public function tagCloud(Wiki $wiki)
    {
        $tags = $wiki->posts()->pluck('tags')->flatten()->unique();
        return view('wikis.tags', compact('wiki', 'tags'));
    }
}
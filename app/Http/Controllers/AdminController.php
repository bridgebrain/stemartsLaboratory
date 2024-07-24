<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wiki;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $wikis = Wiki::all();
        return view('admin.wikis.index', compact('wikis'));
    }

    public function create()
    {
        return view('admin.wikis.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'collection' => 'nullable|string|max:255',
        ]);

        Wiki::create($data);
        return redirect()->route('admin.wikis.index');
    }

    public function edit(Wiki $wiki)
    {
        return view('admin.wikis.edit', compact('wiki'));
    }

    public function update(Request $request, Wiki $wiki)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'collection' => 'nullable|string|max:255',
        ]);

        $wiki->update($data);
        return redirect()->route('admin.wikis.index');
    }

    public function destroy(Wiki $wiki)
    {
        $wiki->delete();
        return redirect()->route('admin.wikis.index');
    }
}
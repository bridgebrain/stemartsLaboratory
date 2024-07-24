<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;
use App\Models\Wiki;

class PostList extends Component
{
    use WithPagination;

    public $wiki;
    public $tag;

    protected $listeners = ['filterByTag'];

    public function mount(Wiki $wiki)
    {
        $this->wiki = $wiki;
    }

    public function render()
    {
        $query = Post::where('wiki_id', $this->wiki->id);

        if ($this->tag) {
            $query->where('tags', 'like', "%{$this->tag}%");
        }

        $posts = $query->paginate(10);
        return view('livewire.post-list', compact('posts'));
    }

    public function loadPost($postId)
    {
        $this->emit('loadPost', $postId);
    }

    public function filterByTag($tag)
    {
        $this->tag = $tag;
    }
}
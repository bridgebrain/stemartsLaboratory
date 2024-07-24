<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\Attributes\On;

class ShowPost extends Component
{
    public $post;
    public $tags = [];

    protected $listeners = ['loadPost', 'filterByTag'];

    #[On('load-post')]
    public function loadPost($postId)
    {
        $this->post = Post::find($postId);

        if ($this->post) {
            $this->post->increment('page_views');
            $this->tags = $this->post->wiki->posts()->pluck('tags')->flatten()->unique();
        } else {
            $this->post = null;
        }
    }

    #[On('filter-by-tag')]
    public function filterByTag($tag)
    {
        $this->post = null;
        $this->tags = $this->post->wiki->posts()->where('tags', 'like', "%{$tag}%")->pluck('tags')->flatten()->unique();
    }

    public function render()
    {
        return view('livewire.show-post', ['post' => $this->post, 'tags' => $this->tags]);
    }
}
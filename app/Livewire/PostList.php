// app/Livewire/PostList.php
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

// app/Livewire/ShowPost.php
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
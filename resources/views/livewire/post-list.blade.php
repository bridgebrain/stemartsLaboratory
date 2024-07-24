<div>
    <div class="posts">
        @foreach($posts as $post)
            <div class="post">
                <h2><a href="#" wire:click.prevent="$dispatch('load-post', postId: {{ $post->id }})">{{ $post->title }}</a></h2>
            </div>
        @endforeach
    </div>
    {{ $posts->links() }}
</div>
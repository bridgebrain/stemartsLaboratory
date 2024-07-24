@extends('layouts.app')

@section('content')
<div class="container">
    @if ($post)
        <h1>{{ $post->title }}</h1>
        <div class="content">
            {!! nl2br(e($post->content)) !!}
        </div>
        <div class="tags mt-3">
            <h3>Tags:</h3>
            @if(is_array($post->tags) && count($post->tags) > 0)
                @foreach($post->tags as $tag)
                    <span class="badge badge-primary">{{ $tag }}</span>
                @endforeach
            @else
                <p>No tags available</p>
            @endif
        </div>
        <a href="{{ route('wikis.show', $post->wiki) }}">Back to {{ $post->wiki->title }}</a>

        <!-- Tag Cloud -->
        <div class="tags mt-3">
            <h3>Tag Cloud:</h3>
            @if(!empty($tags) && $tags->isNotEmpty())
                @foreach($tags as $tag)
                    <a href="{{ route('wikis.search', ['wiki' => $post->wiki->id, 'query' => $tag]) }}" class="badge badge-primary">{{ $tag }}</a>
                @endforeach
            @else
                <p>No tags available</p>
            @endif
        </div>
    @else
        <p>Post not found.</p>
    @endif
</div>
@endsection
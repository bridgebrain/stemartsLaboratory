@extends('layouts.app')

@section('content')
<div class="container">
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
        @if($tags->isNotEmpty())
            @foreach($tags as $tag)
                <form action="{{ route('wikis.search', $post->wiki) }}" method="POST" class="d-inline">
                    @csrf
                    <input type="hidden" name="query" value="{{ $tag }}">
                    <button type="submit" class="btn btn-link p-0">{{ $tag }}</button>
                </form>
            @endforeach
        @else
            <p>No tags available</p>
        @endif
    </div>
</div>
@endsection
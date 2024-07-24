@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $wiki->title }}</h1>
    <p>{{ $wiki->description }}</p>

    <!-- Search Form -->
    <form action="{{ route('wikis.search', $wiki) }}" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" name="query" class="form-control" placeholder="Search posts..." value="{{ isset($query) ? $query : '' }}">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="search_content" id="search_content" {{ isset($search_content) && $search_content ? 'checked' : '' }}>
            <label class="form-check-label" for="search_content">Search in content</label>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    @if(isset($query))
        <p>Search results for "{{ $query }}":</p>
    @endif

    <!-- Posts -->
    <div class="posts mt-3">
        @foreach($posts as $post)
            <div class="post">
                <h2><a href="{{ route('posts.view', [$wiki, $post]) }}">{{ $post->title }}</a></h2>
            </div>
        @endforeach
    </div>
    {{ $posts->links() }}

    <!-- Tag Cloud -->
    <div class="tags mt-3">
        <h3>Tag Cloud:</h3>
        @if($tags->isNotEmpty())
            @foreach($tags as $tag)
                <a href="{{ route('wikis.search', ['wiki' => $wiki->id, 'query' => $tag]) }}" class="badge badge-primary">{{ $tag }}</a>
            @endforeach
        @else
            <p>No tags available</p>
        @endif
    </div>
</div>
@endsection
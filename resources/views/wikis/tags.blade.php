@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tag Cloud for {{ $wiki->title }}</h1>
    <div class="tags">
        @if($tags->isNotEmpty())
            @foreach($tags as $tag)
                <a href="{{ route('wikis.search', $wiki) }}?query={{ urlencode($tag) }}" class="badge badge-primary">{{ $tag }}</a>
            @endforeach
        @else
            <p>No tags available</p>
        @endif
    </div>
    <a href="{{ route('wikis.show', $wiki) }}">Back to {{ $wiki->title }}</a>
</div>
@endsection
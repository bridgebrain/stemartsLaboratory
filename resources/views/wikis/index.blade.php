@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Wikis</h1>
    @foreach($wikis as $wiki)
        <div class="wiki">
            <h2><a href="{{ route('wikis.show', $wiki) }}">{{ $wiki->title }}</a></h2>
            <p>{{ $wiki->description }}</p>
        </div>
    @endforeach
    {{ $wikis->links() }}

<a href="{{ route('wikis.index') }}">Wikis</a>
<a href="{{ route('wikis.show', $wiki->id) }}">View Wiki</a>
</div>
@endsection
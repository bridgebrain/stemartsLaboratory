@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Wikis</h1>
    <ul>
        @foreach ($wikis as $wiki)
            <li>
                <a href="{{ route('wikis.show', $wiki->id) }}">{{ $wiki->title }}</a>
            </li>
        @endforeach
    </ul>

    {{ $wikis->links() }}
</div>
@endsection
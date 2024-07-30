@extends('layouts.embed')

@section('content')
<h1>{{ $wiki->title }}</h1>
<p>{{ $wiki->description }}</p>

<!-- Livewire Component for Posts List -->
@livewire('post-list', ['wiki' => $wiki])
@endsection
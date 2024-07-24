@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Wiki</h1>
    <form action="{{ route('admin.wikis.update', $wiki) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $wiki->title }}" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description">{{ $wiki->description }}</textarea>
        </div>
        <div>
            <label for="collection">Collection</label>
            <input type="text" name="collection" id="collection" value="{{ $wiki->collection }}">
        </div>
        <button type="submit">Update</button>
    </form>
</div>
@endsection
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Create Wiki</h1>
    <form action="{{ route('admin.wikis.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description"></textarea>
        </div>
        <div>
            <label for="collection">Collection</label>
            <input type="text" name="collection" id="collection">
        </div>
        <button type="submit">Create</button>
    </form>
</div>
@endsection
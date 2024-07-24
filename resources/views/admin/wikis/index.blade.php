@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Manage Wikis</h1>
        <a href="{{ route('admin.wikis.create') }}" class="btn btn-primary">Create New Wiki</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wikis as $wiki)
                    <tr>
                        <td>{{ $wiki->title }}</td>
                        <td>{{ $wiki->description }}</td>
                        <td>
                            <a href="{{ route('admin.wikis.edit', $wiki->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.wikis.destroy', $wiki->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Profile</h1>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}">
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}">
        </div>

        <div>
            <label>Password</label>
            <input type="password" name="password">
        </div>

        <div>
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation">
        </div>

        <button type="submit">Update Profile</button>
    </form>
</div>
@endsection
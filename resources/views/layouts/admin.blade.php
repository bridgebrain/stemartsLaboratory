<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name', 'Admin Dashboard') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div id="admin">
        <nav>
            <div class="container">
                <a href="{{ url('/') }}">{{ config('app.name', 'Admin Dashboard') }}</a>
                <div>
                    @guest
                        <a href="{{ route('login') }}">Login</a>
                    @else
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>
        </nav>

        <main class="container">
            @yield('content')
        </main>
    </div>
</body>
</html>
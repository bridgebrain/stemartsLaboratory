<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Embedded View' }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @livewireScripts
</body>
</html>
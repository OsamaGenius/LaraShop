<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ isset($title) ? 'LaraShop: ' . $title : 'LaraShop: Welcome To Our Big Store Market' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @else
            {{--  --}}
        @endif
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    </head>
    <body>
        
        <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

    </body>
</html>
